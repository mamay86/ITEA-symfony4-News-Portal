<?php
namespace App\Service\Post;
use App\Entity\Post;
/**
 * Contract for post service.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface PostServiceInterface
{
    /**
     * Find one post by ID.
     *
     * @param int $id
     *
     * @return Post
     */
    public function findOne(int $id): Post;
}