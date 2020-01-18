<?php

namespace App\Ai\AnswerFormators;

use App\Contracts\AnswerFormat;

class GuanyinAnswerFormator implements AnswerFormat
{
    public function format(array $result): string
    {
        return <<<CONTENT
您抽到的是第{$result['number2']}簽

簽位：{$result['haohua']}
簽語：{$result['qianyu']}
詩意：{$result['shiyi']}
解簽：{$result['jieqian']}
CONTENT;
    }
}
