<?php

namespace App\Domain\Entity;


use App\Domain\ValueObject\AdStatus;

interface Ad
{
    public function setId(int $id);
    public function getId(): int;
    public function setName(string $name);
    public function getName(): string;
    public function isStatusPublished(): bool;
    public function setStatus(AdStatus $adStatus);
    public function getStatus();
    public function publish();
    public function stop();
    public function addComponent(Component $component);
    public function getComponents():array;
    public function getAmountComponents(): int;
    public function serialize(): string;
}