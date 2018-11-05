<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 05.11.18
 * Time: 17:01
 */

namespace Mamay\Bundle\ScrapingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Files
{
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->brochure = $file;

        return $this;
    }
}