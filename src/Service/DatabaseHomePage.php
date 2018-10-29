<?php
namespace App\Service;
use App\Dto\HomePage;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\PostRepositoryInterface;
/**
 * Home service that fetch data from database.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DatabaseHomePage implements HomePageServiceInterface
{
    private $categoryRepository;
    private $postRepository;
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        PostRepositoryInterface $postRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }
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
    /**
     * {@inheritdoc}
     */
    public function getCategories(): iterable
    {
        return $this->categoryRepository->findAllCategories();
    }
    /**
     * {@inheritdoc}
     */
    public function getLatestPosts(): iterable
    {
        return $this->postRepository->getLatest(3);
    }
}