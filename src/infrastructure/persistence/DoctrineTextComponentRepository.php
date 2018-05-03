<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use App\Domain\Entity\TextComponent;
use Doctrine\ORM\EntityManager;

class DoctrineTextComponentRepository implements TextComponentRepository
{
    private $entityManager;
    private $textComponentEntity;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->textComponentEntity = new \App\Entity\TextComponent();
    }

    public function create(TextComponent $textComponent, Ad $ad)
    {
        $adEntity = $this->findAdEntity($ad);
        $this->loadEntityFromTextComponent($textComponent, $adEntity);
        $this->persistTexComponentEntity();
        $this->updateComponentWithId($textComponent);
    }

    private function loadEntityFromTextComponent(TextComponent $textComponent, $adEntity): void
    {
        $this->textComponentEntity->setAd($adEntity);
        $this->textComponentEntity->setCreatedAt(new \DateTime());
        $this->textComponentEntity->setName($textComponent->getName());
        $this->textComponentEntity->setPositionXCoordinate($textComponent->getPosition()->getXCoordinate());
        $this->textComponentEntity->setPositionYCoordinate($textComponent->getPosition()->getYCoordinate());
        $this->textComponentEntity->setPositionZCoordinate($textComponent->getPosition()->getZCoordinate());
        $this->textComponentEntity->setWidth($textComponent->getWidth());
        $this->textComponentEntity->setHeight($textComponent->getHeight());
        $this->textComponentEntity->setText($textComponent->getText());
    }

    private function persistTexComponentEntity(): void
    {
        $this->entityManager->persist($this->textComponentEntity);
        $this->entityManager->flush();
    }

    private function findAdEntity(Ad $ad)
    {
        return $this->entityManager->find(\App\Entity\Ad::class, $ad->getId());
    }

    private function updateComponentWithId(TextComponent $textComponent): void
    {
        $textComponent->setId($this->textComponentEntity->getId());
    }
}