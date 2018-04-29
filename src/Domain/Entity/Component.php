<?php

namespace App\Domain\Entity;


interface Component
{
    public function setId(int $id);
    public function getId(): int;
    public function serialize(): string;
}