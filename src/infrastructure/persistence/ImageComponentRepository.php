<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use App\Domain\Entity\ImageComponent;

interface ImageComponentRepository
{
    public function create(ImageComponent $imageComponent, Ad $ad);
}