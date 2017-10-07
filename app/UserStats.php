<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\UserStats
 *
 * @property int $id
 * @property int $user_id
 * @property int $life
 * @property int $money
 * @property int $max_inventory
 * @method static Builder|UserStats whereId($value)
 * @method static Builder|UserStats whereLife($value)
 * @method static Builder|UserStats whereMaxInventory($value)
 * @method static Builder|UserStats whereMoney($value)
 * @method static Builder|UserStats whereUserId($value)
 * @mixin \Eloquent
 * @property int $user_storage
 * @property int $user_inventory
 * @method static Builder|UserStats whereUserInventory($value)
 * @method static Builder|UserStats whereUserStorage($value)
 */
class UserStats extends Model
{
    protected $table = 'player_stats';
}
