<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\Casino;

interface CasinoRepositoryInterface
{
    public function saveAll(iterable $casinos): void;

    public function findOne(int $id): ?Casino;

    public function getLatest(int $count = 20): iterable;
}
