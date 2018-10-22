<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\ContactServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Contact site controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ContactController extends AbstractController
{
    private $service;
    public function __construct(ContactServiceInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Contact.
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('default/contact.html.twig', [
            'page' => $this->service->getData(),
        ]);
    }
}
