<?php

namespace App\Domain\Entity;


class ImageComponentImp extends ComponentImp implements ImageComponent
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

    public function setLinkToExternalImage(string $linkToExternalImage)
    {
        $this->linkToExternalImage = $linkToExternalImage;
    }

    public function getLinkToExternalImage():string
    {
        return $this->linkToExternalImage;
    }

    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    public function getFormat():string
    {
        return $this->format;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size)
    {
        $this->size = $size;
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
            'linkToExternalImage' => $this->linkToExternalImage,
            'format' => $this->format,
            'size' => $this->size
        ];
    }

}