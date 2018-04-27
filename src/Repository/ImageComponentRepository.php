<?php

namespace App\Repository;

use App\Entity\ImageComponent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageComponent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageComponent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageComponent[]    findAll()
 * @method ImageComponent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageComponentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageComponent::class);
    }

//    /**
//     * @return ImageComponent[] Returns an array of ImageComponent objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageComponent
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
