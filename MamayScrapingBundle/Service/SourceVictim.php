<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mamay\Bundle\ScrapingBundle\Service;

use GuzzleHttp\Client;

class SourceVictim implements SourceVictimInterface
{
    private $victimLinks = [];

    public function __construct($victimLinks)
    {
        $this->victimLinks = $victimLinks;
    }

    public function execute(): void
    {
        foreach ($this->victimLinks as $link) {
            $client = new Client();
            $response = $client->request('GET', $link);

            if (200 == $response->getStatusCode()) {
                $body = $response->getBody();

                $result = new Record();
                $result->add([
                    'link' => $link,
                    'html' => $body,
                ]);
            }
        }
    }
}
