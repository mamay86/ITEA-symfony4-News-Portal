<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
