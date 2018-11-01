<?php
namespace App\Service\Post;
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
     */
    public function findOne(int $id);
    /**
     * Creates new post.
     *
     * @param array $data
     */
    public function create(array $data);
    /**
     * Deletes post.
     *
     * @param int $id
     */
    public function delete(int $id);
    /**
     * Update post.
     *
     * @param int $id
     * @param array $data
     */
    public function edit(int $id, array $data);
    /**
     * Get posts.
     */
    public function getAll();
}