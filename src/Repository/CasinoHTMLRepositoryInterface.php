<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\CasinoHTML;

/**
 * Contract for post repository.
 *
 * @author roma <roman.nagriy@gmail.com>
 */
interface CasinoHTMLRepositoryInterface
{
    /**
     * Saves given post to the storage.
     *
     * @param CasinoHTML $html
     */
    public function save(CasinoHTML $html): void;
}
