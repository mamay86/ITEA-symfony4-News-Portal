<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mamay\Bundle\ScrapingBundle\Controller;

use Mamay\Bundle\ScrapingBundle\Service\ReaderInterface;
use Mamay\Bundle\ScrapingBundle\Service\SourceVictimInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Mamay\Bundle\ScrapingBundle\Entity\Files;
use Mamay\Bundle\ScrapingBundle\Form\FilesType;

class DefaultController extends AbstractController
{
    private $reader;
    private $source;
    public function __construct(ReaderInterface $reader, SourceVictimInterface $source)
    {
        $this->reader = $reader;
        $this->source = $source;
    }

    public function scraping(Request $request)
    {
        $file = new Files();
        $form = $this->createForm(FilesType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $file = $file->getFile();
                $list = $this->reader->getList($file);
                $this->source->execute($list);
            } catch (\Exception $e) {
                \sprintf('Error in proccess. Detail:', $e->getMessage());
            }
        }

        return $this->render('@MamayScraping/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
