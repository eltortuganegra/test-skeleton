<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use App\Domain\Entity\VideoComponent;
use Doctrine\ORM\EntityManager;

class DoctrineVideoComponentRepository implements VideoComponentRepository
{
    private $entityManager;
    private $videoComponentEntity;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->videoComponentEntity = new \App\Entity\VideoComponent();
    }

    public function create(VideoComponent $videoComponent, Ad $ad)
    {
        $adEntity = $this->findAdEntity($ad);
        $this->loadEntityFromImageComponent($videoComponent, $adEntity);
        $this->persistImageComponentEntity();
        $this->updateComponentWithId($videoComponent);
    }

    private function loadEntityFromImageComponent(VideoComponent $videoComponent, $adEntity): void
    {
        $this->videoComponentEntity->setAd($adEntity);
        $this->videoComponentEntity->setCreatedAt(new \DateTime());
        $this->videoComponentEntity->setName($videoComponent->getName());
        $this->videoComponentEntity->setPositionXCoordinate($videoComponent->getPosition()->getXCoordinate());
        $this->videoComponentEntity->setPositionYCoordinate($videoComponent->getPosition()->getYCoordinate());
        $this->videoComponentEntity->setPositionZCoordinate($videoComponent->getPosition()->getZCoordinate());
        $this->videoComponentEntity->setWidth($videoComponent->getWidth());
        $this->videoComponentEntity->setHeight($videoComponent->getHeight());
        $this->videoComponentEntity->setLinkToExternalImage($videoComponent->getLinkToExternalImage());
        $this->videoComponentEntity->setFormat($videoComponent->getFormat());
        $this->videoComponentEntity->setSize($videoComponent->getSize());
    }

    private function persistImageComponentEntity(): void
    {
        $this->entityManager->persist($this->videoComponentEntity);
        $this->entityManager->flush();
    }

    private function findAdEntity(Ad $ad)
    {
        return $this->entityManager->find(\App\Entity\Ad::class, $ad->getId());
    }

    private function updateComponentWithId(VideoComponent $videoComponent): void
    {
        $videoComponent->setId($this->videoComponentEntity->getId());
    }
}