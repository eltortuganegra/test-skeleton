<?php

namespace App\Domain\ValueObject;


class PositionImp implements Position
{
    private $xCoordinate;
    private $yCoordinate;
    private $zCoordinate;

    public function __construct(int $xCoordinate, int $yCoordinate, int $zCoordinate)
    {
        $this->xCoordinate = $xCoordinate;
        $this->yCoordinate = $yCoordinate;
        $this->zCoordinate = $zCoordinate;
    }

    public function getXCoordinate(): int
    {
        return $this->xCoordinate;
    }

    public function getYCoordinate(): int
    {
        return $this->yCoordinate;
    }

    public function getZCoordinate(): int
    {
        return $this->zCoordinate;
    }

    public function toArray(): array
    {
        return [
            'xCoordinate' => $this->xCoordinate,
            'yCoordinate' => $this->yCoordinate,
            'zCoordinate' => $this->zCoordinate,
        ];

    }
}