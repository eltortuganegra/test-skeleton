<?php

namespace App\Domain\Entity;


class AdImp implements Ad
{
    private $status;
    private $components;

    public function __construct()
    {
        $this->status = 'stopped';
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

}