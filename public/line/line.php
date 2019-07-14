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

    if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {

        $in_progress = false; // todo: 状態から判定する

        if ( ! $in_progress) {

            if ($event->getText() === 'amida') {
                $configure = \Amida\ConfigureLoader::load(__DIR__ . '/../config/amida.php');
                /** @var \Amida\NodeInterface $rootNode */
                $rootNode = $configure->getNodes()->firstMatch(['root' => 1]);

                $content = $rootNode->getContent();
                if ($content instanceof \Amida\ContentText) {
                    $response = $bot->replyMessage(
                        $event->getReplyToken(), new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($content->getText())
                    );
                }
            }

        }

    }
}
