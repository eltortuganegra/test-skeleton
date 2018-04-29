<?php

namespace App\Domain\Entity;


class TextComponentImp extends ComponentImp implements TextComponent
{
    private $text;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->text = $data['text'];
    }

    public function serialize(): string
    {
        $data = [
            'name' => $this->name,
            'position' => $this->position,
            'width' => $this->width,
            'height' => $this->height,
            'text' => $this->text,
        ];

        return serialize($data);
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

}