<?php

namespace App\infrastructure\persistence;


use Doctrine\ORM\EntityManager;

class TextComponentRepositoryFactory
{
    public function createDoctrine(EntityManager $entityManager): TextComponentRepository
    {
        return new DoctrineTextComponentRepository($entityManager);
    }
}