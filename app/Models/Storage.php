<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Storage
 *
 * @property int $id
 * @property string $name
 * @property int $length
 * @property int $price
 * @method integer getId()
 * @method integer getLength()
 * @method string getName()
 * @method integer getPrice()
 * @method Storage setId($value)
 * @method Storage setLength($value)
 * @method Storage setName($value)
 * @method Storage setPrice($value)
 * @method static Builder whereId($value)
 * @method static Builder whereLength($value)
 * @method static Builder whereName($value)
 * @method static Builder wherePrice($value)
 * @mixin \Eloquent
 */
class Storage extends CustomModel
{
    protected $table = 'storage';
}
