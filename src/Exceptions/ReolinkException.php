<?php

namespace Nanuc\LaravelReolink\Exceptions;

use Exception;
use Illuminate\Support\Arr;

class ReolinkException extends Exception
{
    public function __construct(public $reolinkResponse)
    {
        $message = 'Error for command "' . $reolinkResponse['cmd'] . '":';

        if(Arr::has($reolinkResponse, 'error.detail')) {
            $message .= ' ' . $reolinkResponse['error']['detail'];
        }
        if(Arr::has($reolinkResponse, 'error.rspCode')) {
            $message .= ' (' . $reolinkResponse['error']['rspCode'] . ')';
        }
        parent::__construct($message);
    }
}