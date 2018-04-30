<?php

namespace App\Domain\Validator;


use App\Domain\Entity\TextComponent;


class TextComponentValidatorImp implements TextComponentValidator
{
    private $textComponent;

    public function __construct(TextComponent $textComponent)
    {
        $this->textComponent = $textComponent;
    }

    public function validate()
    {
        if ($this->doesTheLengthOfTextMoreThan140Characters()) {
            throw new AllComponentsMustBeValidException();
        }
    }

    protected function doesTheLengthOfTextMoreThan140Characters(): bool
    {
        return strlen($this->textComponent->getText()) > 140;
    }

}