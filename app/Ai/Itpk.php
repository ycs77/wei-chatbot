<?php

namespace App\Ai;

use App\Ai\AnswerFormators\GodOfFortuneAnswerFormator;
use App\Ai\AnswerFormators\GuanyinAnswerFormator;
use App\Ai\AnswerFormators\JokeAnswerFormator;
use App\Ai\AnswerFormators\MoonOldAnswerFormator;

class Itpk
{
    protected $apiKey;
    protected $apiSecret;

    public function __construct(string $apiKey, string $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    public function reply(string $question): string
    {
        $query = http_build_query([
            'question' => zh_t_to_s($question),
            'api_key' => $this->apiKey,
            'api_secret' => $this->apiSecret,
        ]);
        $answer = file_get_contents('http://i.itpk.cn/api.php?' . $query);

        $answer = zh_s_to_t($answer);
        $answer = $this->filter($answer);
        $answer = $this->answerFormat($question, $answer);

        return $answer;
    }

    public function answerFormat(string $question, string $answer): string
    {
        if ($array = @json_decode($answer, true)) {
            /** @var \App\Contracts\AnswerFormat $formator */
            $formator = null;

            if (preg_match('/笑話/', $question)) {
                $formator = new JokeAnswerFormator();
            } elseif ($question === '觀音靈簽') {
                $formator = new GuanyinAnswerFormator();
            } elseif ($question === '月老靈簽') {
                $formator = new MoonOldAnswerFormator();
            } elseif ($question === '財神爺靈簽') {
                $formator = new GodOfFortuneAnswerFormator();
            }

            $array = array_map('zh_s_to_t', $array);

            return $formator->format($array);
        }

        return $answer;
    }

    public function filter(string $answer): string
    {
        if (preg_match('/\[face\d+end\]/', $answer)) {
            $answer = preg_replace('/\[face\d+end\]/i', '', $answer);
        }

        return $answer;
    }
}
