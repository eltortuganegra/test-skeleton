<?php

namespace App\Domain\Validator;


use App\Domain\Entity\ImageComponent;

class ImageComponentValidatorFactory
{
    static public function create(ImageComponent $image):ImageComponentValidator
    {
        return new ImageComponentValidatorImp($image);
    }
}