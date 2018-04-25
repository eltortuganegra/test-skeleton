<?php

namespace App\Domain\Validator;


use App\Domain\Entity\ImageComponent;

class ImageComponentValidatorImp implements ImageComponentValidator
{
    private $image;

    public function __construct(ImageComponent $image)
    {
        $this->image = $image;
    }

    public function validate(): bool
    {
        return $this->isFormatPng()
            || $this->isFormatJpg();
    }

    public function isFormatPng(): bool
    {
        return $this->image->getFormat() === 'png';
    }

    public function isFormatJpg(): bool
    {
        return $this->image->getFormat() === 'jpg';
    }
}