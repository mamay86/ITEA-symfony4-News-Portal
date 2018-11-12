<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mamay\Bundle\ScrapingBundle\Controller;

use Mamay\Bundle\ScrapingBundle\Service\Reader;
use Mamay\Bundle\ScrapingBundle\Service\SourceVictim;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Mamay\Bundle\ScrapingBundle\Entity\Files;
use Mamay\Bundle\ScrapingBundle\Form\FilesType;

class DefaultController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function scraping(Request $request)
    {
        $file = new Files();
        $form = $this->createForm(FilesType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * $file stores the uploaded ods file
             *
             * @var Symfony\Component\HttpFoundation\File\UploadedFile
             */
            $file = $file->getFile();

            /**
             * ODS Reader
             * Use PhpSpreadsheet
             */
            $reader = new Reader($file);
            $reader->getResults();
            $links = $reader->getList();

            /**
             * Getting HTML source and put in DB
             * Use GuzzleHttp
             */
            $source = new SourceVictim($links);
            $source->execute();
        }

        return $this->render('@MamayScraping/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
