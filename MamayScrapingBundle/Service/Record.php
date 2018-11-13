<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mamay\Bundle\ScrapingBundle\Service;

use App\Entity\CasinoHTML;
use App\Repository\CasinoHTMLRepositoryInterface;

final class Record implements RecordInterface
{
    private $repository;
    public function __construct(CasinoHTMLRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create new record in html result table
     *
     * @param array $data
     */
    public function add(array $data): void
    {
        $result = new CasinoHTML();
        $result->setLink($data['link']);
        $result->setHTML($data['html']);
        $this->repository->save($result);
    }
}
