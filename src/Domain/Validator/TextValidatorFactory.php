<?php

namespace App\Domain\Validator;

use App\Domain\Entity\TextComponentImp;

class TextValidatorFactory
{
    static public function create(TextComponentImp $text): TextComponentValidator
    {
        return new TextComponentValidatorImp($text);
    }
}