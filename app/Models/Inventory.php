<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

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
 * @method static Builder whereBuyPrice($value)
 * @method static Builder whereCreatedAt($value)
 * @method static Builder whereId($value)
 * @method static Builder whereName($value)
 * @method static Builder whereQuantity($value)
 * @method static Builder whereUpdatedAt($value)
 * @method static Builder whereUserId($value)
 * @mixin \Eloquent
 */
class Inventory extends CustomModel
{
    protected $table = 'inventory';

}
