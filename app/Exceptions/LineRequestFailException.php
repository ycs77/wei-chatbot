<?php

namespace App\Exceptions;

use Exception;

class LineRequestFailException extends Exception
{
    public function __construct($message = 'Request failed')
    {
        parent::__construct($message, 405);
    }
}
