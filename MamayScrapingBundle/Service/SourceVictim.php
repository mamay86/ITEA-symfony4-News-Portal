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
    private $repositoryRecord;
    public function __construct(RecordInterface $repositoryRecord)
    {
        $this->repositoryRecord = $repositoryRecord;
    }

    /**
     * Get html code and put in DB
     *
     * @param array $links
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute(array $links): void
    {
        foreach ($links as $link) {
            $client = new Client();
            $response = $client->request('GET', $link);

            if (200 == $response->getStatusCode()) {
                $body = $response->getBody();

                $this->repositoryRecord->add([
                    'link' => $link,
                    'html' => $body,
                ]);
            }
        }
    }
}
