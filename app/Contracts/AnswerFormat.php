<?php

namespace App\Contracts;

interface AnswerFormat
{
    public function format(array $result): string;
}
