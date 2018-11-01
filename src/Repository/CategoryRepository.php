<?php
namespace App\Repository;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }
    /**
     * {@inheritdoc}
     */
    public function findAllCategories(): iterable
    {
        return $this->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function findBySlug(string $slug): ?Category
    {
        return $this->findOneBy(['title' => $slug]);
    }
}