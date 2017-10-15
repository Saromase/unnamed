<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Inventory
 *
 * @property int $id
 * @property string $name
 * @property int $buy_price
 * @property int $quantity
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Inventory[] findBy(array $value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Inventory[] findByBuyPrice($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Inventory[] findByCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Inventory[] findByName($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Inventory[] findByQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Inventory[] findByUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Inventory[] findByUserId($value)
 * @method static \App\Models\Inventory findOneBy(array $value)
 * @method static \App\Models\Inventory findOneByBuyPrice($value)
 * @method static \App\Models\Inventory findOneByCreatedAt($value)
 * @method static \App\Models\Inventory findOneById($value)
 * @method static \App\Models\Inventory findOneByName($value)
 * @method static \App\Models\Inventory findOneByQuantity($value)
 * @method static \App\Models\Inventory findOneByUpdatedAt($value)
 * @method static \App\Models\Inventory findOneByUserId($value)
 * @method integer getBuyPrice()
 * @method \Carbon\Carbon getCreatedAt()
 * @method integer getId()
 * @method string getName()
 * @method integer getQuantity()
 * @method \Carbon\Carbon getUpdatedAt()
 * @method integer getUserId()
 * @method \App\Models\Inventory setBuyPrice($value)
 * @method \App\Models\Inventory setCreatedAt($value)
 * @method \App\Models\Inventory setId($value)
 * @method \App\Models\Inventory setName($value)
 * @method \App\Models\Inventory setQuantity($value)
 * @method \App\Models\Inventory setUpdatedAt($value)
 * @method \App\Models\Inventory setUserId($value)
 * @mixin \Eloquent
 */
class Inventory extends CustomModel
{
    protected $table = 'user_inventory';
    
    public function addQuantity($nb){
        return $this->setQuantity($this->getQuantity() + $nb);
    }
}
