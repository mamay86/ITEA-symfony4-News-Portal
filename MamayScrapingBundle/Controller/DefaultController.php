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
            var_dump($file);
        }

        return $this->render('@MamayScraping/index.html.twig', array(
            'form' => $form->createView(),
        ));
        //return $this->render('@MamayScraping/index.html.twig', []);
    }
}