<?php

namespace App\infrastructure\persistence;


use Doctrine\ORM\EntityManager;

class AdRepositoryFactory
{
    public function createDoctrine(EntityManager $entityManager): AdRepository
    {
        return new DoctrineAdRepository($entityManager);
    }
}