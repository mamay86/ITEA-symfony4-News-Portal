<?php
namespace App\Repository;
use App\Entity\Post;
/**
 * Contract for post repository.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface PostRepositoryInterface
{
    /**
     * Saves given post to the storage.
     *
     * @param Post $post
     */
    public function save(Post $post): void;
    /**
     * Saves all given posts to the storage.
     *
     * @param iterable $posts
     */
    public function saveAll(iterable $posts): void;
    /**
     * Gets needed count of latest posts.
     *
     * @param int $count
     *
     * @return iterable
     */
    public function getLatest(int $count): iterable;
}