<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/../');
$dotenv->load();

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('LINE_ACCESS_TOKEN'));
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getenv('LINE_CHANNEL_SECRET')]);

$signature = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];

$events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);

/** @var \LINE\LINEBot\Event\BaseEvent $event */
foreach ($events as $event) {
//    $response = $bot->replyMessage(
//        $event->getReplyToken(), new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('HELLO')
//    );

    $line_id = $event->getEventSourceId();

    if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {

        $line_text = $event->getText();
        $bag = new \Amida\Bag();
        $in_progress = false;

        $persistence = new \Amida\PersistenceProvider(
            new \Amida\PersistenceFile(__DIR__ . '/../../data/cache/' . $line_id)
        );
        if ($persistence->exists()) {
            /** @var \Amida\Bag $bag */
            $bag = $persistence->fetch(\Amida\Bag::class);
            if ($bag !== null && $bag->hasNodes()) {
                $in_progress = true;
            }
        }

        $configure = \Amida\ConfigureLoader::load(__DIR__ . '/../config/amida.php');

        if ($in_progress) {
            /** @var \Amida\NodeInterface $latestNode */
            $latestNode = $bag->getNodes()->last();

            $trigger = \Amida\TriggerText::text($line_text);

            $newNode = null;

            foreach ($latestNode->getBranches() as $branch) {
                foreach ($branch->getTriggers() as $branch_trigger) {
                    if ($trigger->equalTo($branch_trigger)) {
                        $newNode = $configure->getNodes()->firstMatch([
                            'id' => $branch->getTo()
                        ]);
                        break;
                    }
                }
            }

            if ($newNode !== null) {
                $messageBuilder = getLINEMessageBuilderByAmidaNode($newNode);
                if ($messageBuilder !== null) {
                    $response = $bot->replyMessage(
                        $event->getReplyToken(), $messageBuilder
                    );
                    if ( ! $response->isSucceeded()) {
                        error_log($response->getRawBody());
                    }
                }

                $bag->addNode($newNode);
                $persistence->save($bag);
            }
        }

        if ($line_text === 'amida') {
            if ($bag->hasNodes()) {
                $bag->clearNodes();
            }

            /** @var \Amida\NodeInterface $rootNode */
            $rootNode = $configure->getNodes()->firstMatch(['root' => 1]);

            $messageBuilder = getLINEMessageBuilderByAmidaNode($rootNode);
            if ($messageBuilder !== null) {
                $response = $bot->replyMessage(
                    $event->getReplyToken(), $messageBuilder
                );
                if ( ! $response->isSucceeded()) {
                    error_log($response->getRawBody());
                }
            }

            $bag->addNode($rootNode);
            $persistence->save($bag);
        }
    }
}

/**
 * @param \Amida\NodeInterface $node
 *
 * @return LINE\LINEBot\MessageBuilder|null
 */
function getLINEMessageBuilderByAmidaNode($node)
{
    $content = $node->getContent();
    if ($content instanceof \Amida\ContentText) {
        $quickReply = null;
        if ($node->hasBranch()) {
            $branches = $node->getBranches();
            $quickReplyButtons = [];
            foreach ($branches as $branch) {
                if ($branch instanceof \Amida\BranchText) {
                    $quickReplyButtons[] = new \LINE\LINEBot\QuickReplyBuilder\ButtonBuilder\QuickReplyButtonBuilder(
                        new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder(
                            $branch->getLabel(),
                            $branch->getText()
                        )
                    );
                }
            }
            if (count($quickReplyButtons) > 0) {
                $quickReply = new \LINE\LINEBot\QuickReplyBuilder\QuickReplyMessageBuilder($quickReplyButtons);
            }
        }

        return new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($content->getText(), $quickReply);
    }

    return null;
}