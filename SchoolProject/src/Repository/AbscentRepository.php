<?php

namespace App\Repository;

use App\Entity\Abscent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Abscent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Abscent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Abscent[]    findAll()
 * @method Abscent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbscentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Abscent::class);
    }

    // /**
    //  * @return Abscent[] Returns an array of Abscent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Abscent
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
