<?php

namespace App\Domain\Entity;


class AdImp implements Ad
{
    private $status;

    public function __construct()
    {
        $this->status = 'stopped';
    }

    public function getStatus()
    {
        return $this->status;
    }
}