<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 9:58 AM
 */

namespace App\Modules\Importer\Repositories\Contracts;

/**
 * Interface PlayerRepositoryInterface
 * @package App\Modules\Importer\Repositories\Contracts
 */
interface PlayerRepositoryInterface
{
    /**
     * Get list of players
     *
     * @return mixed
     */
    public function list();

    /**
     * Get details of a single player
     *
     * @param int $player
     * @return mixed
     */
    public function details(int $player);

    /**
     * Add new player
     *
     * @param array $key
     * @param array $data
     * @return mixed
     */
    public function add(array $key, array $data);
}