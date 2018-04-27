<?php

namespace App\Domain\Entity;


interface ImageComponent
{
    public function setLinkToExternalImage(string $url);
    public function getLinkToExternalImage();
    public function getFormat():string;
}