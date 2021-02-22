<?php

namespace App\Repository;

use App\Entity\RecoveryCodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecoveryCodes|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecoveryCodes|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecoveryCodes[]    findAll()
 * @method RecoveryCodes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecoveryCodesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecoveryCodes::class);
    }

    // /**
    //  * @return RecoveryCodes[] Returns an array of RecoveryCodes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecoveryCodes
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
