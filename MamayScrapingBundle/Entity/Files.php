<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mamay\Bundle\ScrapingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Files
{
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the ODS file.")
     * @Assert\File(mimeTypes={ "application/vnd.oasis.opendocument.spreadsheet" })
     */
    private $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
}
