<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mamay\Bundle\ScrapingBundle\Service;

use PhpOffice\PhpSpreadsheet\Reader\Ods;

class Reader implements ReaderInterface
{
    private $list;
    private $file;

    public function __construct(\Symfony\Component\HttpFoundation\File\UploadedFile $file)
    {
        $this->file = $file;
    }

    public function getList(): array
    {
        return $this->list;
    }

    public function getResults(): array
    {
        $reader = new Ods();
        $spreadsheet = $reader->load($this->file);

        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            foreach ($cellIterator as $cell) {
                $this->list[] = $cell->getValue();
            }
        }

        return $this->list;
    }
}
