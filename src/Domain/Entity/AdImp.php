<?php

namespace App\Domain\Entity;


class AdImp implements Ad
{
    private $createAt;
    private $status;
    private $name;
    private $components;

    public function __construct()
    {
        $this->createAt = new \DateTime();
        $this->status = 'stopped';
        $this->components = [];
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function publish()
    {
        $this->status = 'publishing';
    }

    public function published()
    {
        $this->status = 'published';
    }

    public function addComponent(Component $component)
    {
        if ($this->isStatusPublishing()) {
            throw new AdCanNotBeModifiedIfItsStatusIsPublishingException();
        }
        $this->components[] = $component;
    }

    public function getComponents(): array
    {
        return $this->components;
    }

    public function isStatusPublishing(): bool
    {
        return $this->status == 'publishing';
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

}