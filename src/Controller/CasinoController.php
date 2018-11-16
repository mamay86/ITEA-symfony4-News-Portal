<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\Casino\CasinoServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class CasinoController extends AbstractController
{
    /**
     * Parsing casino html.
     *
     * @return Response
     */
    public function parse(CasinoServiceInterface $service): Response
    {
        try {
            $result = $service->parsingCasinoHTML();
        } catch (\Exception $e) {
            \sprintf('Error in proccess. Detail:', $e->getMessage());
        }

        return $this->render('casino/parse.html.twig', [
            'pagesCount' => $result['countHTMLAdded'],
            'casinosCount' => $result['countCasinosAdded'],
        ]);
    }
    /**
     * View casino by ID.
     *
     * @param int $id
     *
     * @return Response
     */
    public function view(CasinoServiceInterface $service, int $id): Response
    {
        return $this->render('casino/view.html.twig', [
            'casino' => $service->findOne($id),
        ]);
    }
}
