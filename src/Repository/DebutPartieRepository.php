<?php

namespace App\Repository;

use App\Entity\DebutPartie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DebutPartie|null find($id, $lockMode = null, $lockVersion = null)
 * @method DebutPartie|null findOneBy(array $criteria, array $orderBy = null)
 * @method DebutPartie[]    findAll()
 * @method DebutPartie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DebutPartieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DebutPartie::class);
    }

    // /**
    //  * @return DebutPartie[] Returns an array of DebutPartie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DebutPartie
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
