<?php

namespace App\Domain\Entity;


interface VideoComponent
{
    public function setLinkToExternalImage(string $linkToExternalImage);
    public function getLinkToExternalImage(): string;
    public function setFormat(string $format);
    public function getFormat(): string;
    public function setSize(int $size);
    public function getSize(): int;
}

