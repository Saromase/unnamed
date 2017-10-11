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
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Storage setId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Storage setLength($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Storage setName($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\Storage setPrice($value)
 * @mixin \Eloquent
 */
class Storage extends CustomModel
{
    protected $table = 'storage';
}
