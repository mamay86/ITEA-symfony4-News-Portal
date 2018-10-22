<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Model\ContactPage;

/**
 * Contract for contact page service.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface ContactServiceInterface
{
    /**
     * Gets home page data.
     *
     * @return ContactPage
     */
    public function getData(): ContactPage;
}
