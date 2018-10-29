<?php
namespace App\Service;
use App\Entity\Post;
use App\Repository\PostRepositoryInterface;

/**
 * Home service that fetch data from database.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostPage implements PostPageServiceInterface
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        // TODO: Some static Data
    }

    public function getPost($postID)
    {
        return $this->postRepository->getPost($postID)[0];
    }
}