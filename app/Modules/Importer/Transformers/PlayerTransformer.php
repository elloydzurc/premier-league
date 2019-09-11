<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 10:23 AM
 */

namespace App\Modules\Importer\Transformers;

use App\Modules\Importer\Models\Player;
use League\Fractal\TransformerAbstract;

/**
 * Class PlayerTransformer
 * @package App\Modules\Importer\Transformers
 */
class PlayerTransformer extends TransformerAbstract
{
    /**
     * @param Player $player
     * @return array
     */
    public function transform(Player $player)
    {
        return [
            'id' => $player->getAttributeValue('id'),
            'full_name' => $player->getAttributeValue('first_name') . ' ' . $player->getAttributeValue('second_name')
        ];
    }
}
