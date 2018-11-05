<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
    /**
     * Find one post by ID.
     *
     * @param int $id
     *
     * @return null|Post
     */
    public function findOne(int $id): ?Post;
    /**
     * Deletes post.
     *
     * @param int $id
     */
    public function delete(int $id);
    /**
     * Get all posts.
     */
    public function getAll();
}
