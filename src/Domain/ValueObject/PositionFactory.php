<?php

namespace App\Domain\ValueObject;


class PositionFactory
{
    static public function create(int $xCoordinate, $yCoordinate, $zCoordinate): Position
    {
        return new PositionImp($xCoordinate, $yCoordinate, $zCoordinate);
    }

}