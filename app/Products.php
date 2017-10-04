<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Products
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @method static Builder|Products whereId($value)
 * @method static Builder|Products whereName($value)
 * @method static Builder|Products wherePrice($value)
 * @mixin \Eloquent
 */
class Products extends Model
{
    protected $table = 'products';
}
