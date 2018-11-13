<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\CasinoHTML;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|CasinoHTML find($id, $lockMode = null, $lockVersion = null)
 * @method null|CasinoHTML findOneBy(array $criteria, array $orderBy = null)
 * @method CasinoHTML[]    findAll()
 * @method CasinoHTML[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasinoHTMLRepository extends ServiceEntityRepository implements CasinoHTMLRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CasinoHTML::class);
    }

    /**
     * {@inheritdoc}
     */
    public function save(CasinoHTML $html): void
    {
        $em = $this->getEntityManager();
        $em->persist($html);
        $em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function findAllHTML(): iterable
    {
        return $this->findAll();
    }
}
