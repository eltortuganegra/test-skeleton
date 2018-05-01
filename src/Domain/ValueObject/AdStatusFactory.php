<?php

namespace App\Domain\ValueObject;


class AdStatusFactory
{
    const AD_STATUS_PUBLISHING = 1;

    static public function createPublishing(): AdStatus
    {
        return new AdStatusImp(self::AD_STATUS_PUBLISHING);
    }

}