<?php

namespace App\infrastructure\persistence;


use Throwable;

class AdNotFoundException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = 'Ad not found.';
    }
}