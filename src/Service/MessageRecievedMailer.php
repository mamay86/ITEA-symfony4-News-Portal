<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

final class MessageRecievedMailer implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    private $mailer;
    public $supportEmail = 'temp@news-port.com';
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
//    public function setSupportEmail(string $email): void
//    {
//        $this->supportEmail = $email;
//    }
    public function send(string $clientEmail): bool
    {
        $message = (new \Swift_Message('News Portal | Thank you for feedback!'))
            ->setFrom($this->container->getParameter('app.support_mail'))
            ->setTo($clientEmail)
            ->setBody('Your feedback was successfully recived!')
        ;

        return (bool) $this->mailer->send($message);
    }
}
