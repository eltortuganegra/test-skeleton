<?php

namespace App\Domain\Entity;


class TextComponentFactory
{
    static public function create(array $data): TextComponent
    {
        return new TextComponentImp($data);
    }
}