<?php
namespace Greeflas\Bundle\NewsletterBundle\Service;
use Greeflas\Bundle\NewsletterBundle\Dto\Subscriber;
use Greeflas\Bundle\NewsletterBundle\Dto\CsvUploader;
final class NewsletterSubscriber implements NewsletterSubscriberInterface
{
    public function save(Subscriber $subscriber)
    {
        $csvSubscriber = new CsvUploader($subscriber->getEmail());
        $csvSubscriber->updateSubsribers();
    }
}