<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use App\Domain\Entity\VideoComponent;

interface VideoComponentRepository
{
    public function create(VideoComponent $videoComponent, Ad $ad);
}