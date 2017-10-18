<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Storage
 *
 * @property int $id
 * @property string $name
 * @property int $length
 * @property int $price
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Storage[] findBy(array $value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Storage[] findByLength($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Storage[] findByName($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Storage[] findByPrice($value)
 * @method static \App\Models\Storage findOneBy(array $value)
 * @method static \App\Models\Storage findOneById($value)
 * @method static \App\Models\Storage findOneByLength($value)
 * @method static \App\Models\Storage findOneByName($value)
 * @method static \App\Models\Storage findOneByPrice($value)
 * @method integer getId()
 * @method integer getLength()
 * @method string getName()
 * @method integer getPrice()
 * @method \App\Models\Storage setId($value)
 * @method \App\Models\Storage setLength($value)
 * @method \App\Models\Storage setName($value)
 * @method \App\Models\Storage setPrice($value)
 * @mixin \Eloquent
 */
class Storage extends CustomModel
{
    protected $table = 'storage';
}
