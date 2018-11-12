<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 05.11.18
 * Time: 13:45
 */

namespace Mamay\Bundle\ScrapingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Mamay\Bundle\ScrapingBundle\Entity\Files;
use Mamay\Bundle\ScrapingBundle\Form\FilesType;
use PhpOffice\PhpSpreadsheet\Reader\Ods;
use GuzzleHttp\Client;

class DefaultController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function scraping(Request $request)
    {
        $file = new Files();
        $form = $this->createForm(FilesType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $file->getFile();

            $links = [];
            $reader = new Ods();
            $spreadsheet = $reader->load($file);

            $worksheet = $spreadsheet->getActiveSheet();

            foreach ($worksheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                //    even if a cell value is not set.
                // By default, only cells that have a value
                //    set will be iterated.
                foreach ($cellIterator as $cell) {
                        $links[] = $cell->getValue();
                }
            }

            foreach ($links as $link) {
                $client = new Client();
                $response = $client->request('GET', $link);

                $body = $response->getBody();
                echo $body;

                die();
            }
        }

        return $this->render('@MamayScraping/index.html.twig', array(
            'form' => $form->createView(),
        ));
        //return $this->render('@MamayScraping/index.html.twig', []);
    }
}