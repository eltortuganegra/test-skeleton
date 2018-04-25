<?php

namespace App\Domain\Entity;


class ImageComponentImp extends ComponentImp implements ImageComponent
{
    private $url;
    private $format;
    private $size;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->url = $data['url'];
        $this->format = $data['format'];
        $this->size = $data['size'];
    }


    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public function getUrl():string
    {
        return $this->url;
    }

    public function getFormat():string
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
            'url' => $this->url,
            'format' => $this->format,
            'size' => $this->size
        ];

        return serialize($data);
    }

}