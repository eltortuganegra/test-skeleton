<?php

namespace App\Domain\Validator;

use App\Domain\Entity\TextComponent;

class TextComponentValidatorFactory
{
    static public function create(TextComponent $textComponent): TextComponentValidator
    {
        return new TextComponentValidatorImp($textComponent);
    }
}