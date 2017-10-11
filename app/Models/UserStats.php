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
 * @method UserStats setId($value)
 * @method UserStats setLife($value)
 * @method UserStats setMaxInventory($value)
 * @method UserStats setMoney($value)
 * @method UserStats setUserId($value)
 * @method UserStats setUserStorage($value)
 * @method static Builder whereId($value)
 * @method static Builder whereLife($value)
 * @method static Builder whereMaxInventory($value)
 * @method static Builder whereMoney($value)
 * @method static Builder whereUserId($value)
 * @method static Builder whereUserStorage($value)
 * @mixin \Eloquent
 */
class UserStats extends CustomModel
{
    protected $table = 'player_stats';
    
    public $timestamps = false;
}
