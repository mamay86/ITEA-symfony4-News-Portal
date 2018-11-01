<?php
namespace App\Service\Post;
use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
/**
 * Service provides post data from the storage.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostService implements PostServiceInterface
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    /**
     * {@inheritdoc}
     */
    public function findOne(int $id): Post
    {
        $post =$this->postRepository->findOne($id);
        if (null === $post) {
            throw new NotFoundHttpException(\sprintf('Post with ID %d not found', $id));
        }
        return $post;
    }
}