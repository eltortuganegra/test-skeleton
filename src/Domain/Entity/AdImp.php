<?php

namespace App\Domain\Entity;


use App\Domain\ValueObject\AdStatus;
use App\Domain\ValueObject\AdStatusFactory;

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
        $this->status = AdStatusFactory::createPublishing();
        $this->components = [];
        $this->amountComponents = 0;
        if ( ! empty($data)) {
            if (key_exists('name', $data)) {
                $this->name = $data['name'];
            }
            if (key_exists('status', $data)) {
                $this->status = $data['status'];
            }
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

    public function setStatus(AdStatus $adStatus)
    {
        $this->status = $adStatus;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function publish()
    {
        $this->setStatus(AdStatusFactory::createPublished());
    }

    public function stop()
    {
        $this->setStatus(AdStatusFactory::createStopped());
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
        return $this->status->getValue() == AdStatusFactory::AD_STATUS_PUBLISHED;
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

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status->getValue(),
            'components' => []
        ];
        if ($this->amountComponents > 0) {
            foreach ($this->components as $component)
            {
                $data['components'][] = $component->toArray();
            }
        }

        return $data;

    }
}