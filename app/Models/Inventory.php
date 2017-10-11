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
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method integer getBuyPrice()
 * @method \Carbon\Carbon getCreatedAt()
 * @method integer getId()
 * @method string getName()
 * @method integer getQuantity()
 * @method \Carbon\Carbon getUpdatedAt()
 * @method integer getUserId()
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Inventory setBuyPrice($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Inventory setCreatedAt($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Inventory setId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Inventory setName($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Inventory setQuantity($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Inventory setUpdatedAt($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Inventory setUserId($value)
 * @mixin \Eloquent
 */
class Inventory extends CustomModel
{
    protected $table = 'inventory';

}
