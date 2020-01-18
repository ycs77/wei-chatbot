<?php

namespace App\Ai\AnswerFormators;

use App\Contracts\AnswerFormat;

class GodOfFortuneAnswerFormator implements AnswerFormat
{
    public function format(array $result): string
    {
        return <<<CONTENT
您抽到的是第{$result['number2']}簽

簽語：{$result['qianyu']}
註釋：{$result['zhushi']}
解簽：{$result['jieqian']}
解說：{$result['jieshuo']}
說明：{$result['jieguo']}

婚姻：{$result['hunyin']}
事業：{$result['shiye']}
功名：{$result['gongming']}
失物：{$result['shiwu']}
出外移居：{$result['cwyj']}
六甲：{$result['liujia']}
求財：{$result['qiucai']}
交易：{$result['jiaoyi']}
疾病：{$result['jibin']}
訴訟：{$result['susong']}
運途：{$result['yuntu']}
某事：{$result['moushi']}
合夥做生意：{$result['hhzsy']}
CONTENT;
    }
}
