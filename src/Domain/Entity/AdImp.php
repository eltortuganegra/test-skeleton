<?php

namespace App\Domain\Entity;


class AdImp implements Ad
{
    private $id;
    private $createAt;
    private $status;
    private $name;
    private $components;
    private $amountComponents;

    public function __construct(array $data = null)
    {
        $this->createAt = new \DateTime();
        $this->status = 'publishing';
        $this->components = [];
        $this->amountComponents = 0;
        if ( ! empty($data) && key_exists('name', $data)) {
            $this->name = $data['name'];
        }
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getStatus()
    {
        return $this->status;
    }

    public function publish()
    {
        $this->status = 'published';
    }

    public function stop()
    {
        $this->status = 'stopped';
    }

    public function addComponent(Component $component)
    {
        if ($this->isStatusPublished()) {
            throw new AdCanNotBeModifiedIfItsStatusIsPublishingException();
        }
        $this->components[] = $component;
        $this->amountComponents++;
    }

    public function getComponents(): array
    {
        return $this->components;
    }

    public function isStatusPublished(): bool
    {
        return $this->status == 'published';
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmountComponents(): int
    {
        return $this->amountComponents;
    }
}