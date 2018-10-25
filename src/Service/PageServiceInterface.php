<?php
namespace App\Service;
/**
 * Base page service contract.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface PageServiceInterface
{
    /**
     * Gets page data.
     *
     * @return mixed
     */
    public function getData();
}