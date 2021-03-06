<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

    /**
     * Finds category by slug.
     *
     * @param string $slug
     *
     * @return mixed
     */
    public function findBySlug(string $slug);
}
