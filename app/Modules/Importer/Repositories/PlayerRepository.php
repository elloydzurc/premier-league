<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 9:57 AM
 */

namespace App\Modules\Importer\Repositories;

use App\Modules\Importer\Models\Player;
use App\Modules\Importer\Repositories\Contracts\PlayerRepositoryInterface;

/**
 * Class PlayerRepository
 * @package App\Modules\Importer\Repositories
 */
class PlayerRepository implements PlayerRepositoryInterface
{
    /**
     * @var Player $model
     */
    protected $model;

    /**
     * PlayerRepository constructor.
     *
     * @param Player $model
     */
    public function __construct(Player $model)
    {
        $this->model = $model;
    }

    /**
     * Get list of players
     *
     * @return mixed
     */
    public function list()
    {
        return $this->model;
    }

    /**
     * Get details of a single player
     *
     * @param int $player
     * @return mixed
     */
    public function details(int $player)
    {
        return $this->model
            ->where('id', $player)
            ->first();
    }
}