<?php
namespace App\Controller;
use App\Service\Post\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
/**
 * Controller provides post pages.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostController extends AbstractController
{
    private $service;
    public function __construct(PostServiceInterface $service)
    {
        $this->service = $service;
    }
    /**
     * View article by ID.
     *
     * @param int $id
     *
     * @return Response
     */
    public function view(int $id): Response
    {
        return $this->render('post/view.html.twig', [
            'post' => $this->service->findOne($id),
        ]);
    }
}