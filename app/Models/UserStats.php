<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\UserStats
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_storage
 * @property int $life
 * @property int $money
 * @property int $max_inventory
 * @method integer getId()
 * @method integer getLife()
 * @method integer getMaxInventory()
 * @method integer getMoney()
 * @method integer getUserId()
 * @method integer getUserStorage()
 * @method Builder|UserStats setId($value)
 * @method Builder|UserStats setLife($value)
 * @method Builder|UserStats setMaxInventory($value)
 * @method Builder|UserStats setMoney($value)
 * @method Builder|UserStats setUserId($value)
 * @method Builder|UserStats setUserStorage($value)
 * @method static Builder|UserStats whereId($value)
 * @method static Builder|UserStats whereLife($value)
 * @method static Builder|UserStats whereMaxInventory($value)
 * @method static Builder|UserStats whereMoney($value)
 * @method static Builder|UserStats whereUserId($value)
 * @method static Builder|UserStats whereUserStorage($value)
 * @mixin \Eloquent
 */
class UserStats extends CustomModel
{
    protected $table = 'player_stats';
}
