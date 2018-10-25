<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Dto\ContactsPage;

/**
 * Contract for contacts page.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface ContactsPageServiceInterface extends PageServiceInterface
{
    /**
     * Gets contacts page data.
     *
     * @return ContactsPage
     */
    public function getData(): ContactsPage;
}
