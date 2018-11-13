<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Casino;

use App\Entity\Casino;
use App\Repository\CasinoHTMLRepositoryInterface;
use App\Repository\CasinoRepositoryInterface;

class CasinoService implements CasinoServiceInterface
{
    private $countHTMLAdded = 0;
    private $countCasinosAdded = 0;

    private $casinoHTMLRepository;
    private $parseRepository;
    private $casinoRepository;
    public function __construct(
        CasinoHTMLRepositoryInterface $casinoHTMLRepository,
        ParseServiceInterface $parseRepository,
        CasinoRepositoryInterface $casinoRepository
    ) {
        $this->casinoHTMLRepository = $casinoHTMLRepository;
        $this->parseRepository = $parseRepository;
        $this->casinoRepository = $casinoRepository;
    }

    /**
     * Getting HTML from table, parse and put in DB
     *
     * @return array
     */
    public function parsingCasinoHTML(): array
    {
        $allRecords = $this->casinoHTMLRepository->findAllHTML();

        foreach ($allRecords as $record) {
            $this->countHTMLAdded++;
            $prepareCasinos = $this->parseRepository->get($record->html);
            $this->putToDB($prepareCasinos);
        }

        return [
            'countHTMLAdded' => $this->countHTMLAdded,
            'countCasinosAdded' => $this->countCasinosAdded,
        ];
    }

    /**
     * Put results in DB
     *
     * @param array $prepareCasinos
     */
    private function putToDB(array $prepareCasinos): void
    {
        $casinos = [];

        foreach ($prepareCasinos as $prepareCasino) {
            $this->countCasinosAdded++;
            $casino = new Casino();
            $casino
                ->setName($prepareCasino['name'])
                ->setRating((float) $prepareCasino['rating'])
            ;
            $casinos[] = $casino;
        }
        $this->casinoRepository->saveAll($casinos);
    }
}
