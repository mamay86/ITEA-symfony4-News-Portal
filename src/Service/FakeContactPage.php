<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Model\ContactPage;

/**
 * Service provides fake data for contact page.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakeContactPage implements ContactServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getData(): ContactPage
    {
        $faker = \Faker\Factory::create();

        return new ContactPage(
            '093-0353538',
            'karlson2006@ukr.net',
            '15 Hrecshatic str., Kiev',
            'Register',
            $faker->name('male'),
            $faker->email(),
            $faker->words(10, true),
            'Submit'
        );
    }
}
