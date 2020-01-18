<?php

namespace App\Ai\AnswerFormators;

use App\Contracts\AnswerFormat;

class JokeAnswerFormator implements AnswerFormat
{
    public function format(array $result): string
    {
        return <<<CONTENT
標題：{$result['title']}
內容：{$result['content']}
CONTENT;
    }
}
