<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Api\Document;

/**
 * Represents API response.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class Document implements \JsonSerializable
{
    private $links = [];
    private $data = [];
    public function setLinks(array $links): void
    {
        $this->links = $links;
    }
    public function setData($data): void
    {
        $this->data = $data;
    }
    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'links' => $this->links,
            'data' => $this->data,
        ];
    }
}
