<?php

namespace App\Domain\Entity;


interface ImageComponent
{
    public function setLinkToExternalImage(string $url);
    public function getLinkToExternalImage();
    public function setFormat(string $format);
    public function getFormat(): string;
    public function setSize(int $size);
    public function getSize(): int;
}