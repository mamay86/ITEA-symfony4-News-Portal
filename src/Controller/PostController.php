<?php
namespace App\Controller;
use App\Service\PostPageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
/**
 * Post controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class PostController extends AbstractController
{
    /**
     * Home page.
     *
     * @param PostPageServiceInterface $service
     *
     * @return Response
     */
    public function index(PostPageServiceInterface $post, $postID): Response
    {
        return $this->render('post/index.html.twig', [
            'post' => $post->getPost($postID)
        ]);
    }
}