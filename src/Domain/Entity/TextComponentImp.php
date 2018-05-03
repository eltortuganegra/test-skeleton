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

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position->toArray(),
            'width' => $this->width,
            'height' => $this->height,
            'text' => $this->text,
        ];
    }

}