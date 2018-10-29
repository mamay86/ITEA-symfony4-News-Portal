<?php
namespace App\Service;
use App\Dto\HomePage;
/**
 * Contract for home page service.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface HomePageServiceInterface extends PageServiceInterface
{
    /**
     * Gets home page data.
     *
     * @return HomePage
     */
    public function getData(): HomePage;
    /**
     * Gets post categories.
     *
     * @return iterable
     */
    public function getCategories(): iterable;
    /**
     * Gets latest posts.
     *
     * @return iterable
     */
    public function getLatestPosts(): iterable;
}