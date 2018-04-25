<?php

namespace App\Domain\Validator;


use App\Domain\Entity\ImageComponent;

class ImageValidatorFactory
{
    static public function create(ImageComponent $image):ImageComponentValidator
    {
        return new ImageComponentValidatorImp($image);
    }
}