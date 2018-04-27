<?php

namespace App\Domain\Entity;


class VideoComponentImp extends ComponentImp implements VideoComponent
{
    private $linkToExternalImage;
    private $format;
    private $size;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->linkToExternalImage = $data['linkToExternalImage'];
        $this->format = $data['format'];
        $this->size = $data['size'];
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function serialize(): string
    {
        $data = [
            'name' => $this->name,
            'position' => $this->position,
            'width' => $this->width,
            'height' => $this->height,
            'linkToExternalImage' => $this->linkToExternalImage,
            'format' => $this->format,
            'size' => $this->size
        ];

        return serialize($data);
    }
}