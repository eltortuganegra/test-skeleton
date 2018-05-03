<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use App\Domain\Entity\ImageComponent;
use Doctrine\ORM\EntityManager;

class ImageComponentRepositoryDoctrine implements ImageComponentRepository
{
    private $entityManager;
    private $imageComponentEntity;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->imageComponentEntity = new \App\Entity\ImageComponent();
    }

    public function create(ImageComponent $imageComponent, Ad $ad)
    {
        $adEntity = $this->findAdEntity($ad);
        $this->loadEntityFromImageComponent($imageComponent, $adEntity);
        $this->persistImageComponentEntity();
        $this->updateComponentWithId($imageComponent);
    }

    private function loadEntityFromImageComponent(ImageComponent $imageComponent, $adEntity): void
    {
        $this->imageComponentEntity->setAd($adEntity);
        $this->imageComponentEntity->setCreatedAt(new \DateTime());
        $this->imageComponentEntity->setName($imageComponent->getName());
        $this->imageComponentEntity->setPositionXCoordinate($imageComponent->getPosition()->getXCoordinate());
        $this->imageComponentEntity->setPositionYCoordinate($imageComponent->getPosition()->getYCoordinate());
        $this->imageComponentEntity->setPositionZCoordinate($imageComponent->getPosition()->getZCoordinate());
        $this->imageComponentEntity->setWidth($imageComponent->getWidth());
        $this->imageComponentEntity->setHeight($imageComponent->getHeight());
        $this->imageComponentEntity->setLinkToExternalImage($imageComponent->getLinkToExternalImage());
        $this->imageComponentEntity->setFormat($imageComponent->getFormat());
        $this->imageComponentEntity->setSize($imageComponent->getSize());
    }

    private function persistImageComponentEntity(): void
    {
        $this->entityManager->persist($this->imageComponentEntity);
        $this->entityManager->flush();
    }

    private function findAdEntity(Ad $ad)
    {
        return $this->entityManager->find(\App\Entity\Ad::class, $ad->getId());
    }

    private function updateComponentWithId(ImageComponent $imageComponent): void
    {
        $imageComponent->setId($this->imageComponentEntity->getId());
    }
}