<?php

namespace App\Domain\Entity;


interface Component
{
    public function serialize(): string;
}