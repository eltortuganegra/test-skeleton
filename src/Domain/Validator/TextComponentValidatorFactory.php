<?php

namespace App\Domain\Validator;

use App\Domain\Entity\TextComponentImp;

class TextComponentValidatorFactory
{
    static public function create(TextComponentImp $text): TextComponentValidator
    {
        return new TextComponentValidatorImp($text);
    }
}