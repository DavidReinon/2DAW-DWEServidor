<?php

namespace App\Repository;

use App\Entity\Pista;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pista>
 */
class PistaRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Pista::class);
    }

    /**
     * @return Pista[] Returns an array of Pista objects
     */
    public function findByNoLibreField(): array {
        return $this->createQueryBuilder('p')
            ->andWhere('p.libre = :val')
            ->setParameter('val', false)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?Pista
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
