<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 10:06 AM
 */

namespace App\Modules\Importer\Services\Contracts;

/**
 * Interface ImporterServiceInterface
 * @package App\Modules\Importer\Services\Contracts
 */
interface ImporterServiceInterface
{
    /**
     * Get list of players
     *
     * @return mixed
     */
    public function getList();

    /**
     * Get details of a single player
     *
     * @param int $player
     * @return mixed
     */
    public function getDetails(int $player);

    /**
     * Populate player table from Providers API
     *
     * @return mixed
     */
    public function populate();
}
