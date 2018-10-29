<?php
namespace App\Service;
use App\Dto\HomePage;
/**
 * Service provides fake data for home page.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakeHomePage implements HomePageServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getData(): HomePage
    {
        $faker = \Faker\Factory::create();
        return new HomePage(
            'News Portal',
            $faker->words(20, true),
            'Read News',
            'Suggest news'
        );
    }
    /**
     * {@inheritdoc}
     */
    public function getCategories(): iterable
    {
        return new \EmptyIterator();
    }
    /**
     * {@inheritdoc}
     */
    public function getLatestPosts(): iterable
    {
        return new \EmptyIterator();
    }
}