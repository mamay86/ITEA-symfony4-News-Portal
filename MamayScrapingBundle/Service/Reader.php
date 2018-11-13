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
    private $list = [];

    /**
     * Getting list of the victim links from ods file
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     *
     * @return array
     */
    public function getList(\Symfony\Component\HttpFoundation\File\UploadedFile $file): array
    {
        $reader = new Ods();
        $spreadsheet = $reader->load($file);

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
