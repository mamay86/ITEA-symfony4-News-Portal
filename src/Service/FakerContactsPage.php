<?php
namespace App\Service;
use App\Dto\ContactsPage;
/**
 * Service provides fake data for contacts page.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakerContactsPage implements ContactsPageServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getData(): ContactsPage
    {
        $faker = \Faker\Factory::create();
        return new ContactsPage(
            $faker->address,
            $faker->tollFreePhoneNumber,
            $faker->email
        );
    }
}