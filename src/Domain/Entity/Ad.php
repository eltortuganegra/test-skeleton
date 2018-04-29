<?php

namespace App\Domain\Entity;


interface Ad
{
    public function setId(int $id);
    public function getId(): int;
    public function setName(string $name);
    public function getName(): string;
    public function isStatusPublishing(): bool;
    public function getStatus();
    public function publish();
    public function published();
    public function addComponent(Component $component);
    public function getComponents():array;
    public function getAmountComponents(): int;
}