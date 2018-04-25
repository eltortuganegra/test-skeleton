<?php

namespace App\Domain\Entity;


interface ImageComponent
{
    public function setUrl(string $url);
    public function getUrl();
    public function getFormat():string;
}