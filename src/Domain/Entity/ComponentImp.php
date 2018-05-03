<?php

namespace App\Domain\Entity;


use App\Domain\ValueObject\Position;
use App\Domain\ValueObject\PositionFactory;

abstract class ComponentImp implements Component
{
    protected $id;
    protected $name;
    protected $position;
    protected $width;
    protected $height;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->position = PositionFactory::create(
            $data['position']['x_coordinate'],
            $data['position']['y_coordinate'],
            $data['position']['z_coordinate']
        );
        $this->width = $data['width'];
        $this->height = $data['height'];
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPosition(Position $position)
    {
        $this->position = $position;
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

}