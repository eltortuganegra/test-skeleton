<?php

namespace App\infrastructure\persistence;


use Doctrine\ORM\EntityManager;

class AdRepositoryFactory
{
    static public function createDoctrine(EntityManager $entityManager): AdRepository
    {
        return new AdRepositoryDoctrine($entityManager);
    }
}