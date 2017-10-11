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
 * @method static Collection|Storage[] findBy(array $value)
 * @method static Collection|Storage[] findByLength($value)
 * @method static Collection|Storage[] findByName($value)
 * @method static Collection|Storage[] findByPrice($value)
 * @method static Storage findOneBy(array $value)
 * @method static Storage findOneById($value)
 * @method static Storage findOneByLength($value)
 * @method static Storage findOneByName($value)
 * @method static Storage findOneByPrice($value)
 * @method integer getId()
 * @method integer getLength()
 * @method string getName()
 * @method integer getPrice()
 * @method Storage setId($value)
 * @method Storage setLength($value)
 * @method Storage setName($value)
 * @method Storage setPrice($value)
 * @mixin \Eloquent
 */
class Storage extends CustomModel
{
    protected $table = 'storage';
}
