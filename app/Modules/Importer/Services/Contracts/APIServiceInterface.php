<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 12:08 PM
 */

namespace App\Modules\Importer\Services\Contracts;


interface APIServiceInterface
{
    /**
     * Get response from the API provider
     *
     * @return mixed
     */
    public function get();
}