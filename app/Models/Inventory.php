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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Collection|Inventory[] findBy(array $value)
 * @method static Collection|Inventory[] findByBuyPrice($value)
 * @method static Collection|Inventory[] findByCreatedAt($value)
 * @method static Collection|Inventory[] findByName($value)
 * @method static Collection|Inventory[] findByQuantity($value)
 * @method static Collection|Inventory[] findByUpdatedAt($value)
 * @method static Collection|Inventory[] findByUserId($value)
 * @method static Inventory findOneBy(array $value)
 * @method static Inventory findOneByBuyPrice($value)
 * @method static Inventory findOneByCreatedAt($value)
 * @method static Inventory findOneById($value)
 * @method static Inventory findOneByName($value)
 * @method static Inventory findOneByQuantity($value)
 * @method static Inventory findOneByUpdatedAt($value)
 * @method static Inventory findOneByUserId($value)
 * @method static Collection|Inventory[] get($columns = [])
 * @method integer getBuyPrice()
 * @method Carbon getCreatedAt()
 * @method integer getId()
 * @method string getName()
 * @method integer getQuantity()
 * @method Carbon getUpdatedAt()
 * @method integer getUserId()
 * @method Inventory setBuyPrice($value)
 * @method Inventory setCreatedAt($value)
 * @method Inventory setId($value)
 * @method Inventory setName($value)
 * @method Inventory setQuantity($value)
 * @method Inventory setUpdatedAt($value)
 * @method Inventory setUserId($value)
 * @mixin \Eloquent
 */
class Inventory extends CustomModel
{
    protected $table = 'user_inventory';

    /**
     * @param int $nb
     * @return Inventory
     */
    public function addQuantity($nb){
        return $this->setQuantity($this->getQuantity() + $nb);
    }
}
