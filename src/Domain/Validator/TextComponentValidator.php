<?php

namespace App\Domain\Validator;


interface TextComponentValidator
{
    public function validate(): bool;
}