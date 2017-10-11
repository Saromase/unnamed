<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\UserStats
 *
 * @property int $id
 * @property int $user_id
 * @property int $storage_id
 * @property int $life
 * @property int $money
 * @property int $inventory
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
 * @method integer getInventory()
 * @method integer getStorageId()
 * @method \App\Models\UserStats setInventory($value)
 * @method \App\Models\UserStats setStorageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder whereStorageId($value)
 */
class UserStats extends CustomModel
{
    protected $table = 'player_stats';
    
    public $timestamps = false;
}
