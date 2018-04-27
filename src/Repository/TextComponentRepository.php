<?php

namespace App\Repository;

use App\Entity\TextComponent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TextComponent|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextComponent|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextComponent[]    findAll()
 * @method TextComponent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextComponentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TextComponent::class);
    }

//    /**
//     * @return TextComponent[] Returns an array of TextComponent objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TextComponent
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
