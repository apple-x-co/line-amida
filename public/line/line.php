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

        $persistence = new \Amida\Persistence(__DIR__ . '/../../data/cache/' . $line_id);
        if ($persistence->exists()) {
            $bag = $persistence->fetch(\Amida\Bag::class);
            if ($bag !== null) {
                $in_progress = true;
            }
        }

        $configure = \Amida\ConfigureLoader::load(__DIR__ . '/../config/amida.php');

        if ($in_progress) {
            // todo:
        } else {
            if ($line_text === 'amida') {
                /** @var \Amida\NodeInterface $rootNode */
                $rootNode = $configure->getNodes()->firstMatch(['root' => 1]);

                $content = $rootNode->getContent();
                if ($content instanceof \Amida\ContentText) {

                    $quickReply = null;
                    if ($rootNode->hasBranch()) {
                        $branches = $rootNode->getBranches();
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

                    $response = $bot->replyMessage(
                        $event->getReplyToken(), new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($content->getText(), $quickReply)
                    );
                    if ( ! $response->isSucceeded()) {
                        error_log($response->getRawBody());
                    }
                }

                $bag->addNode($rootNode);
            }

        }

        $persistence->save($bag);
    }
}
