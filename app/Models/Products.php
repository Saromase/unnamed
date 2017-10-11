<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Products
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $min_price
 * @property string $max_price
 * @method integer getId()
 * @method string getMaxPrice()
 * @method string getMinPrice()
 * @method string getName()
 * @method string getPrice()
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Products setId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Products setMaxPrice($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Products setMinPrice($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Products setName($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Products setPrice($value)
 * @mixin \Eloquent
 */
class Products extends CustomModel
{
    protected $table = 'products';
}
