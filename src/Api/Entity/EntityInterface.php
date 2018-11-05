<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Api\Entity;

/**
 * Contract for entities.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface EntityInterface
{
    /**
     * Gets unique ID of entity.
     *
     * @return mixed
     */
    public function getId();
}
