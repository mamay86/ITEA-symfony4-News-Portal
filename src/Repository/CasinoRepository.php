<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\Casino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|Casino find($id, $lockMode = null, $lockVersion = null)
 * @method null|Casino findOneBy(array $criteria, array $orderBy = null)
 * @method Casino[]    findAll()
 * @method Casino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasinoRepository extends ServiceEntityRepository implements CasinoRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Casino::class);
    }

    /**
     * {@inheritdoc}
     */
    public function saveAll(iterable $casinos): void
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        try {
            foreach ($casinos as $casino) {
                $em->persist($casino);
            }
            $em->flush();
            $em->commit();
        } catch (ORMException $e) {
            $em->rollback();
        }
    }
    /**
     * {@inheritdoc}
     */
    public function findOne(int $id): ?Casino
    {
        return $this->find($id);
    }
    /**
     * {@inheritdoc}
     */
    public function getLatest(int $count = 20): iterable
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults($count)
            ->orderBy('p.id', 'desc')
            ->getQuery()
            ->getResult()
            ;
    }
}
