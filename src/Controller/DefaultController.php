<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\ContactsPageServiceInterface;
use App\Service\HomePageServiceInterface;
use App\Service\MessageRecievedMailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Default site controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DefaultController extends AbstractController
{
    /**
     * Home page.
     *
     * @param HomePageServiceInterface $service
     *
     * @return Response
     */
    public function index(HomePageServiceInterface $service): Response
    {
        return $this->render('default/index.html.twig', [
            'page' => $service->getData(),
            'categories' => $service->getCategories(),
            'latest_posts' => $service->getLatestPosts(),
        ]);
    }
    /**
     * Contacts page.
     *
     * @param ContactsPageServiceInterface $service
     *
     * @return Response
     */
    public function contacts(ContactsPageServiceInterface $service, MessageRecievedMailer $mailer): Response
    {
        $mailer->send('vldmr.kuprienko@gmail.com');

        return $this->render('default/contacts.html.twig', [
            'page' => $service->getData(),
        ]);
    }
}
