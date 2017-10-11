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
 * @method integer getInventory()
 * @method integer getLife()
 * @method integer getMoney()
 * @method integer getStorageId()
 * @method integer getUserId()
 * @method UserStats setId($value)
 * @method UserStats setInventory($value)
 * @method UserStats setLife($value)
 * @method UserStats setMoney($value)
 * @method UserStats setStorageId($value)
 * @method UserStats setUserId($value)
 * @method static Builder whereId($value)
 * @method static Builder whereInventory($value)
 * @method static Builder whereLife($value)
 * @method static Builder whereMoney($value)
 * @method static Builder whereStorageId($value)
 * @method static Builder whereUserId($value)
 * @mixin \Eloquent
 */
class UserStats extends CustomModel
{
    protected $table = 'player_stats';
    
    public $timestamps = false;

    /**
     * @return Storage|null
     */
    public function getStorage()
    {
        return Storage::whereId($this->storage_id)->first();
    }
}
