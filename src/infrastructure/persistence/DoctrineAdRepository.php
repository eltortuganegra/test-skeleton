<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use Doctrine\ORM\EntityManager;

class DoctrineAdRepository implements AdRepository
{
    private $entityManager;
    private $adEntity;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->adEntity = new \App\Entity\Ad();
    }

    public function create(Ad $ad)
    {
        $this->loadAdEntityFromAd($ad);
        $this->persistAdEntity();
    }

    private function loadAdEntityFromAd(Ad $ad): void
    {
        $this->adEntity->setCreatedAt(new \DateTime());
        $this->adEntity->setName($ad->getName());
    }

    private function persistAdEntity(): void
    {
        $this->entityManager->persist($this->adEntity);
        $this->entityManager->flush();
    }
}