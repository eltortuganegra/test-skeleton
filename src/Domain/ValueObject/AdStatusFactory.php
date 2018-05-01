<?php

namespace App\Domain\ValueObject;


class AdStatusFactory
{
    const AD_STATUS_PUBLISHING = 1;
    const AD_STATUS_PUBLISHED = 2;

    static public function createPublishing(): AdStatus
    {
        return new AdStatusImp(self::AD_STATUS_PUBLISHING);
    }

    static public function createPublished(): AdStatus
    {
        return new AdStatusImp(self::AD_STATUS_PUBLISHED);
    }

}