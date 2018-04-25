<?php

namespace App\Domain\Entity;


class AdFactoryImp implements AdFactory
{

    static public function create():Ad
    {
        return new AdImp();
    }
}