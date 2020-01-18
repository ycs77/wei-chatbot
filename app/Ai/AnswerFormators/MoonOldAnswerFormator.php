<?php

namespace App\Ai\AnswerFormators;

use App\Contracts\AnswerFormat;

class MoonOldAnswerFormator implements AnswerFormat
{
    public function format(array $result): string
    {
        return <<<CONTENT
您抽到的是第{$result['number2']}簽

簽位：{$result['haohua']}
簽語：{$result['shiyi']}
註釋：{$result['zhushi']}
解簽：{$result['jieqian']}
白话释义：{$result['baihua']}
CONTENT;
    }
}
