<?php

namespace App\Domain\Entity;


interface Component
{
    public function setId(int $id);
    public function getId(): int;
    public function setName(string $name);
    public function getName(): string;
    public function setPosition(string $position);
    public function getPosition(): string;
    public function setWidth(int $width);
    public function getWidth(): int;
    public function setHeight(int $height);
    public function getHeight(): int;
    public function serialize(): string;
}



