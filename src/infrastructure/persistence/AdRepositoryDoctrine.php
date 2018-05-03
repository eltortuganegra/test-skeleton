<?php

namespace App\infrastructure\persistence;


use App\Domain\Entity\Ad;
use App\Domain\Entity\AdFactory;
use Doctrine\ORM\EntityManager;

class AdRepositoryDoctrine implements AdRepository
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
        $ad->setId($this->adEntity->getId());
    }

    private function loadAdEntityFromAd(Ad $ad): void
    {
        $this->adEntity->setCreatedAt(new \DateTime());
        $this->adEntity->setName($ad->getName());
        $this->adEntity->setStatus($ad->getStatus()->getValue());
    }

    private function persistAdEntity(): void
    {
        $this->entityManager->persist($this->adEntity);
        $this->entityManager->flush();

    }

    public function getAdEntity()
    {
        return $this->adEntity;
    }

    public function getById(int $id)
    {
        $entity = $this->entityManager->find(\App\Entity\Ad::class, $id);

        if (empty($entity)) {
            throw new AdNotFoundException();
        }

        $data = [
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'status' => $entity->getStatus(),
        ];
        $ad = AdFactory::create($data);

        return $ad;
    }

    public function update(Ad $ad)
    {
        $this->loadAdEntityFromAd($ad);
        $this->entityManager->flush();
    }
}