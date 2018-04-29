<?php

namespace App\Domain\Service;


use App\Domain\Entity\Ad;

class CreateAdServiceResponse
{
    private $ad;

    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    public function getAd():Ad
    {
        return $this->ad;
    }

}