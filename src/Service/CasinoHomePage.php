<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Dto\HomePage;
use App\Repository\CasinoRepositoryInterface;

/**
 * Home service that fetch data from database.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class CasinoHomePage implements HomePageServiceInterface
{
    private $casinoRepository;
    public function __construct(CasinoRepositoryInterface $casinoRepository) {
        $this->casinoRepository = $casinoRepository;
    }
    /**
     * {@inheritdoc}
     */
    public function getData(): HomePage
    {
        // TODO: fetch data from database
        $faker = \Faker\Factory::create();

        return new HomePage(
            'Scraping & parsing',
            'text',
            'Read News',
            'Suggest news'
        );
    }
    /**
     * {@inheritdoc}
     */
    public function getCategories(): iterable
    {
        return [];
    }
    /**
     * {@inheritdoc}
     */
    public function getLatestPosts(): iterable
    {
        return $this->casinoRepository->getLatest(20);
    }
}
