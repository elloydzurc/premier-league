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
 * @method static updateOrCreate(array $key, array $data)
 */
class Player extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'code',
        'first_name',
        'second_name',
        'total_points',
        'influence',
        'creativity',
        'threat',
        'ict_index'
    ];

    /**
     * @var array $casts
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
