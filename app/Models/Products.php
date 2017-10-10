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
 * @method static Builder|Products whereId($value)
 * @method static Builder|Products whereName($value)
 * @method static Builder|Products wherePrice($value)
 * @method static Builder|Products whereMaxPrice($value)
 * @method static Builder|Products whereMinPrice($value)
 * @mixin \Eloquent
 */
class Products extends Model
{
    protected $table = 'products';
}
