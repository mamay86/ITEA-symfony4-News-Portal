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
class PostService implements PostServiceInterface
{
    protected $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    /**
     * {@inheritdoc}
     */
    public function findOne(int $id)
    {
        $post =$this->postRepository->findOne($id);
        if (null === $post) {
            throw new NotFoundHttpException(\sprintf('Post with ID %d not found', $id));
        }
        return $post;
    }


    /**
     * Creates new post.
     *
     * @param array $data
     */
    public function create(array $data)
    {
        // TODO: Implement create() method.
    }
    public function delete(int $id)
    {
        $this->postRepository->delete($id);
    }

    public function edit(int $id, array $data)
    {
        // TODO: Implement edit() method.
    }

    /**
     * Get posts.
     */
    public function getAll()
    {
        return $this->postRepository->getAll();
    }
}