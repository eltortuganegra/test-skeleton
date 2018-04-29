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
        $this->status = 'stopped';
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
        $this->amountComponents++;
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

    public function getAmountComponents(): int
    {
        return $this->amountComponents;
    }
}