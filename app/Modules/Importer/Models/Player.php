<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 9:55 AM
 */

namespace App\Modules\Importer\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 * @package App\Modules\Importer\Models
 *
 * @method where(string $column, $value)
 */
class Player extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'total_points',
        'influence',
        'creativity',
        'threat',
        'ict_index'
    ];
}
