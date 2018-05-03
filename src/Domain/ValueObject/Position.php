<?php

namespace App\Domain\ValueObject;


interface Position
{
    public function getXCoordinate(): int;
    public function getYCoordinate(): int;
    public function getZCoordinate(): int;
    public function toArray(): array;
}