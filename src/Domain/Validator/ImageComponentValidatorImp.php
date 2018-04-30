<?php

namespace App\Domain\Validator;


use App\Domain\Entity\ImageComponent;

class ImageComponentValidatorImp implements ImageComponentValidator
{
    private $imageComponent;

    public function __construct(ImageComponent $imageComponent)
    {
        $this->imageComponent = $imageComponent;
    }

    public function validate()
    {
        if ($this->isFormatPng() || $this->isFormatJpg()) {
        } else {
            throw new AllComponentsMustBeValidException();
        }
    }

    public function isFormatPng(): bool
    {
        return $this->imageComponent->getFormat() === 'png';
    }

    public function isFormatJpg(): bool
    {
        return $this->imageComponent->getFormat() === 'jpg';
    }
}