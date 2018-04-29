<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use App\Domain\Entity\TextComponent;

interface TextComponentRepository
{
    public function create(TextComponent $textComponent, Ad $ad);
}