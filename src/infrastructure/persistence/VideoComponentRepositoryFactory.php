<?php

namespace App\infrastructure\persistence;


use Doctrine\ORM\EntityManager;

class VideoComponentRepositoryFactory
{
    public function createDoctrine(EntityManager $entityManager): VideoComponentRepository
    {
        return new DoctrineVideoComponentRepository($entityManager);
    }
}