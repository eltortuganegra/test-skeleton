<?php

namespace App\Domain\Entity;


abstract class ComponentImp implements Component
{
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

}