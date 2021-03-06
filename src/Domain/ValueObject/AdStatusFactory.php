<?php

namespace App\Domain\ValueObject;


class AdStatusFactory
{
    const AD_STATUS_PUBLISHING = 1;
    const AD_STATUS_PUBLISHED = 2;
    const AD_STATUS_STOPPED = 3;

    static public function create(int $statusCode): AdStatus
    {
        if ($statusCode == self::AD_STATUS_PUBLISHING
            || $statusCode == self::AD_STATUS_PUBLISHED
            || $statusCode == self::AD_STATUS_STOPPED){

            return new AdStatusImp(self::AD_STATUS_PUBLISHING);
        }
    }

    static public function createPublishing(): AdStatus
    {
        return new AdStatusImp(self::AD_STATUS_PUBLISHING);
    }

    static public function createPublished(): AdStatus
    {
        return new AdStatusImp(self::AD_STATUS_PUBLISHED);
    }

    static public function createStopped(): AdStatus
    {
        return new AdStatusImp(self::AD_STATUS_STOPPED);
    }

}