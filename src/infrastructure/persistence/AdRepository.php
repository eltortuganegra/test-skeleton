<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;

interface AdRepository
{
    public function create(Ad $ad);
}