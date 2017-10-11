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
 * @method Builder|Products setId($value)
 * @method Builder|Products setMaxPrice($value)
 * @method Builder|Products setMinPrice($value)
 * @method Builder|Products setName($value)
 * @method Builder|Products setPrice($value)
 * @method static Builder|Products whereId($value)
 * @method static Builder|Products whereMaxPrice($value)
 * @method static Builder|Products whereMinPrice($value)
 * @method static Builder|Products whereName($value)
 * @method static Builder|Products wherePrice($value)
 * @mixin \Eloquent
 */
class Products extends CustomModel
{
    protected $table = 'products';
}
