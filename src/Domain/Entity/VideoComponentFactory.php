<?php

namespace App\Domain\Entity;


class VideoComponentFactory
{
    static public function create(array $data): VideoComponent
    {
        return new VideoComponentImp($data);
    }
}