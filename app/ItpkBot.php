<?php

namespace App;

class ItpkBot
{
    protected $apiKey;
    protected $apiSecret;

    public function __construct(string $apiKey, string $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    public function reply(string $question)
    {
        $question = urlencode(zh_t_to_s($question));

        $answer = file_get_contents('https://i.itpk.cn/api.php?question=' . $question . '&api_key=' . $this->apiKey . '&api_secret=' . $this->apiSecret);

        $answer = zh_s_to_t($answer);

        if ($json = @json_decode($answer, true)) {
            if (isset($json['content'])) {
                return zh_s_to_t($json['content']);
            }
        }

        return $answer;
    }
}
