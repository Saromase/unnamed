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
 * @method Products setId($value)
 * @method Products setMaxPrice($value)
 * @method Products setMinPrice($value)
 * @method Products setName($value)
 * @method Products setPrice($value)
 * @method static Builder whereId($value)
 * @method static Builder whereMaxPrice($value)
 * @method static Builder whereMinPrice($value)
 * @method static Builder whereName($value)
 * @method static Builder wherePrice($value)
 * @mixin \Eloquent
 */
class Products extends CustomModel
{
    protected $table = 'products';
}
