<?php

namespace App\Domain\Entity;


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
        $this->position = $data['position'];
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

    public function setPosition(string $position)
    {
        $this->position = $position;
    }

    public function getPosition(): string
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