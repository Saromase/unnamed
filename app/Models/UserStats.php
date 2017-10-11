<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\UserStats
 *
 * @property int $id
 * @property int $user_id
 * @property int $storage_id
 * @property int $life
 * @property int $money
 * @property int $inventory
 * @method static Collection|UserStats[] findByInventory($value)
 * @method static Collection|UserStats[] findByLife($value)
 * @method static Collection|UserStats[] findByMoney($value)
 * @method static Collection|UserStats[] findByStorageId($value)
 * @method static Collection|UserStats[] findByUserId($value)
 * @method static UserStats findOneById($value)
 * @method static UserStats findOneByInventory($value)
 * @method static UserStats findOneByLife($value)
 * @method static UserStats findOneByMoney($value)
 * @method static UserStats findOneByStorageId($value)
 * @method static UserStats findOneByUserId($value)
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
        return Storage::findOneById($this->storage_id);
    }
}
