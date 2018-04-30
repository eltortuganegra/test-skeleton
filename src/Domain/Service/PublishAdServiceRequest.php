<?php

namespace App\Domain\Service;


class PublishAdServiceRequest implements ServiceRequest
{
    private $adId;

    public function __construct(int $adId)
    {
        $this->adId = $adId;
    }

    public function getAdId(): int
    {
        return $this->adId;
    }

}