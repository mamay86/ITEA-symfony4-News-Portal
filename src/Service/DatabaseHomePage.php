<?php
namespace App\Service;
use App\Dto\HomePage;
final class DatabaseHomePage implements HomePageServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getData(): HomePage
    {
        // TODO: fetch data from database
        $faker = \Faker\Factory::create();
        return new HomePage(
            'News Portal',
            $faker->words(20, true),
            'Read News',
            'Suggest news'
        );
    }
}