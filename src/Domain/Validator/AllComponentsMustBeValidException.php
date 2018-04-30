<?php

namespace App\Domain\Validator;


use Throwable;

class AllComponentsMustBeValidException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = 'All components must be valid.';
    }

}