<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Products
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $min_price
 * @property string $max_price
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findBy(array $value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByMaxPrice($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByName($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByPrice($value)
 * @method static \App\Models\Products findOneBy(array $value)
 * @method static \App\Models\Products findOneById($value)
 * @method static \App\Models\Products findOneByMaxPrice($value)
 * @method static \App\Models\Products findOneByMinPrice($value)
 * @method static \App\Models\Products findOneByName($value)
 * @method static \App\Models\Products findOneByPrice($value)
 * @method integer getId()
 * @method string getMaxPrice()
 * @method string getMinPrice()
 * @method string getName()
 * @method string getPrice()
 * @method \App\Models\Products setId($value)
 * @method \App\Models\Products setMaxPrice($value)
 * @method \App\Models\Products setMinPrice($value)
 * @method \App\Models\Products setName($value)
 * @method \App\Models\Products setPrice($value)
 * @mixin \Eloquent
 */
class Products extends CustomModel
{
    protected $table = 'products';
}
