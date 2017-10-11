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
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\UserStats setId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\UserStats setLife($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\UserStats setMaxInventory($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\UserStats setMoney($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\UserStats setUserId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\UserStats setUserStorage($value)
 * @mixin \Eloquent
 */
class UserStats extends CustomModel
{
    protected $table = 'player_stats';
}
