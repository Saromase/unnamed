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
 * @method Builder|Inventory setBuyPrice($value)
 * @method Builder|Inventory setCreatedAt($value)
 * @method Builder|Inventory setId($value)
 * @method Builder|Inventory setName($value)
 * @method Builder|Inventory setQuantity($value)
 * @method Builder|Inventory setUpdatedAt($value)
 * @method Builder|Inventory setUserId($value)
 * @method static Builder|Inventory whereBuyPrice($value)
 * @method static Builder|Inventory whereCreatedAt($value)
 * @method static Builder|Inventory whereId($value)
 * @method static Builder|Inventory whereName($value)
 * @method static Builder|Inventory whereQuantity($value)
 * @method static Builder|Inventory whereUpdatedAt($value)
 * @method static Builder|Inventory whereUserId($value)
 * @mixin \Eloquent
 */
class Inventory extends CustomModel
{
    protected $table = 'inventory';

}
