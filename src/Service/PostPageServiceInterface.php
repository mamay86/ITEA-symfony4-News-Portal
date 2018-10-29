<?php
namespace App\Service;
use App\Entity\Post;
/**
 * Contract for post service.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface PostPageServiceInterface extends PageServiceInterface
{
    /**
     * Gets home page data.
     *
     * $postID id of the post
     *
     */
    public function getPost($postID);

}