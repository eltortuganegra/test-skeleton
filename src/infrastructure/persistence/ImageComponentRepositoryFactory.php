<?php

namespace App\infrastructure\persistence;


use Doctrine\ORM\EntityManager;

class ImageComponentRepositoryFactory
{
    public function createDoctrine(EntityManager $entityManager): ImageComponentRepository
    {
        return new DoctrineImageComponentRepository($entityManager);
    }
}