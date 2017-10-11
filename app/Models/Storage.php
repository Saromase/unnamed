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
 * @method Builder|Storage setId($value)
 * @method Builder|Storage setLength($value)
 * @method Builder|Storage setName($value)
 * @method Builder|Storage setPrice($value)
 * @method static Builder|Storage whereId($value)
 * @method static Builder|Storage whereLength($value)
 * @method static Builder|Storage whereName($value)
 * @method static Builder|Storage wherePrice($value)
 * @mixin \Eloquent
 */
class Storage extends CustomModel
{
    protected $table = 'storage';
}
