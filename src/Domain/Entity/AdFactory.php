<?php

namespace App\Domain\Entity;


class AdFactory
{
    static public function create(array $data = null):Ad
    {
        return new AdImp($data);
    }
}