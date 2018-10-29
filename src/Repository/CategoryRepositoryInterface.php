<?php
namespace App\Repository;
/**
 * Contract for category repository.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface CategoryRepositoryInterface
{
    /**
     * Finds all categories in storage.
     *
     * @return iterable
     */
    public function findAllCategories(): iterable;
}