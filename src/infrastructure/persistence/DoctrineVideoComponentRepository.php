<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use App\Domain\Entity\ImageComponent;
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
    }

    private function loadEntityFromImageComponent(VideoComponent $videoComponent, $adEntity): void
    {
        $this->videoComponentEntity->setAd($adEntity);
        $this->videoComponentEntity->setCreatedAt(new \DateTime());
        $this->videoComponentEntity->setName($videoComponent->getName());
        $this->videoComponentEntity->setPosition($videoComponent->getPosition());
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
}