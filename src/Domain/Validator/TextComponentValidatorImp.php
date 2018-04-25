<?php

namespace App\Domain\Validator;


use App\Domain\Entity\TextComponentImp;

class TextComponentValidatorImp implements TextComponentValidator
{
    private $text;

    public function __construct(TextComponentImp $text)
    {
        $this->text = $text;
    }

    public function validate(): bool
    {
        return false;
    }

}