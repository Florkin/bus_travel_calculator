<?php

namespace App\Repository;

use App\Entity\GroupOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupOrder[]    findAll()
 * @method GroupOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupOrder::class);
    }

    // /**
    //  * @return GroupOrder[] Returns an array of GroupOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupOrder
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
