<?php

namespace App\Repository;

use App\Entity\VideoComponent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VideoComponent|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoComponent|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoComponent[]    findAll()
 * @method VideoComponent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoComponentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VideoComponent::class);
    }

//    /**
//     * @return VideoComponent[] Returns an array of VideoComponent objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VideoComponent
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
