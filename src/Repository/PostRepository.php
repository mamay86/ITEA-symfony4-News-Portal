<?php
namespace App\Repository;
use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }
    /**
     * {@inheritdoc}
     */
    public function save(Post $post): void
    {
        // TODO: Implement save() method.
    }
    /**
     * {@inheritdoc}
     */
    public function saveAll(iterable $posts): void
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        try {
            foreach ($posts as $post) {
                var_dump($post);
                $em->persist($post);
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
    public function getLatest(int $count = 3): iterable
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.category', 'c')
            ->setMaxResults($count)
            ->orderBy('p.id', 'desc')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function getPost(int $id): iterable
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.category', 'c')
            ->where('p.id =' . $id)
            ->getQuery()
            ->getResult()
            ;
    }
}