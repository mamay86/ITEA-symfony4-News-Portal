<?php

namespace App\Repository;

use App\Entity\CasinoHTML;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CasinoHTML|null find($id, $lockMode = null, $lockVersion = null)
 * @method CasinoHTML|null findOneBy(array $criteria, array $orderBy = null)
 * @method CasinoHTML[]    findAll()
 * @method CasinoHTML[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasinoHTMLRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CasinoHTML::class);
    }

//    /**
//     * @return CasinoHTML[] Returns an array of CasinoHTML objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CasinoHTML
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
