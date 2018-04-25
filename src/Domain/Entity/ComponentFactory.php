<?php

namespace App\Domain\Entity;


class ComponentFactory
{
    static public function createImageComponent(array $data): ImageComponent
    {
        return ImageComponentFactory::create($data);
    }

    static public function createVideoComponent(array $data): VideoComponent
    {
        return VideoComponentFactory::create($data);
    }

    static public function createTextComponent(array $data): TextComponent
    {
        return TextComponentFactory::create($data);
    }
}