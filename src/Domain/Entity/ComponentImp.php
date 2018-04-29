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

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

}