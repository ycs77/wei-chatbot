<?php

namespace App;

use App\Ai\Itpk;
use App\Datas\Joke;
use App\LINEBotTiny;

class Controller
{
    public function index()
    {
        $channelAccessToken = env('LINEBOT_CHANNEL_ACCESS_TOKEN');
        $channelSecret = env('LINEBOT_CHANNEL_SECRET');

        $client = new LINEBotTiny($channelAccessToken, $channelSecret);

        foreach ($client->parseEvents() as $event) {
            switch ($event['type']) {
                case 'message':
                    $message = $event['message'];

                    switch ($message['type']) {
                        case 'text':
                            $text = '';

                            if (preg_match('/笑話/', $message['text'])) {
                                $text = (new Joke)->random();
                            } else {
                                $text = $this->say($message['text']);
                            }

                            $client->replyMessage([
                                'replyToken' => $event['replyToken'],
                                'messages' => [
                                    [
                                        'type' => 'text',
                                        'text' => $text,
                                    ],
                                ],
                            ]);

                            break;

                        default:
                            throw new LineRequestFailException('Unsupported message type: ' . $message['type']);
                            break;
                    }
                    break;

                default:
                    throw new LineRequestFailException('Unsupported event type: ' . $event['type']);
                    break;
            }
        }

        return json_encode([
            'code' => 200,
            'message' => 'Success',
        ]);
    }

    public function say(string $message)
    {
        $itpkApiKey = env('ITPK_API_KEY');
        $itpkApiSecret = env('ITPK_API_SECRET');

        $itpkBot = new Itpk($itpkApiKey, $itpkApiSecret);

        return $itpkBot->reply($message);
    }
}
