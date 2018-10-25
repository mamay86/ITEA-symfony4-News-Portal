<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Greeflas\Bundle\NewsletterBundle\Controller;

use Greeflas\Bundle\NewsletterBundle\Dto\Subscriber;
use Greeflas\Bundle\NewsletterBundle\Service\NewsletterSubscriberInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    public function subscribe(Request $request, NewsletterSubscriberInterface $service)
    {
        $dto = new Subscriber($request->get('email', ''));
        $service->save($dto);

        return $this->redirectToRoute('index');
    }
}
