<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 11:41 AM
 */

namespace App\Modules\Importer\Transformers;

use App\Modules\Importer\Models\Player;
use League\Fractal\TransformerAbstract;

/**
 * Class PlayerDetailsTransformer
 * @package App\Modules\Importer\Transformers
 */
class PlayerDetailsTransformer extends TransformerAbstract
{
    /**
     * @param Player $player
     * @return array
     */
    public function transform(Player $player)
    {
        return [
            'id' => $player->getAttributeValue('id'),
            'first_name' => $player->getAttributeValue('first_name'),
            'second_name' => $player->getAttributeValue('second_name'),
            'total_points' => $player->getAttributeValue('total_points'),
            'influence' => $player->getAttributeValue('influence'),
            'creativity' => $player->getAttributeValue('creativity'),
            'threat' => $player->getAttributeValue('threat'),
            'ict_index' => $player->getAttributeValue('ict_index'),
            'created_at' => $player->getAttributeValue('created_at'),
            'updated_at' => $player->getAttributeValue('updated_at')
        ];
    }
}
