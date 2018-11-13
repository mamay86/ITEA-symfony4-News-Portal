<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Casino;

use Symfony\Component\DomCrawler\Crawler;

class ParseService implements ParseServiceInterface
{
    /**
     * Parsing from HTML to casino entity
     *
     * @param $html
     *
     * @return array
     */
    public function get($html): array
    {
        $casinos = [];

        $html = \stream_get_contents($html);

        $crawler = new Crawler($html);

        $casinos[] = $crawler->filter('.card-list__item')->each(function (Crawler $node, $i) {
            return [
                    'name' => $node->filter('h3 span.title')->text(),
                    'rating' => $node->filter('div.star-rating')->attr('data-rating'),
                   ];
        });

        return $casinos[0];
    }
}
