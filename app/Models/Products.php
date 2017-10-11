<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Products
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $min_price
 * @property string $max_price
 * @method static Collection|Products[] findByMaxPrice($value)
 * @method static Collection|Products[] findByMinPrice($value)
 * @method static Collection|Products[] findByName($value)
 * @method static Collection|Products[] findByPrice($value)
 * @method static Products findOneById($value)
 * @method static Products findOneByMaxPrice($value)
 * @method static Products findOneByMinPrice($value)
 * @method static Products findOneByName($value)
 * @method static Products findOneByPrice($value)
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
 * @mixin \Eloquent
 */
class Products extends CustomModel
{
    protected $table = 'products';
}
