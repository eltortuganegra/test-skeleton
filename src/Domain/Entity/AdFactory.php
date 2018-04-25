<?php

namespace App\Domain\Entity;


class AdFactory
{

    static public function create():Ad
    {
        return new AdImp();
    }
}