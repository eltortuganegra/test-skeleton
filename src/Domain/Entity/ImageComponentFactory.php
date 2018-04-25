<?php

namespace App\Domain\Entity;


class ImageComponentFactory
{
    static public function create(array $data):ImageComponent
    {
        return new ImageComponentImp($data);
    }
}