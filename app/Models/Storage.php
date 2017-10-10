<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Storage
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $length
 * @property int $price
 * @method static Builder|Storage whereId($value)
 * @method static Builder|Storage whereLength($value)
 * @method static Builder|Storage whereName($value)
 * @method static Builder|Storage wherePrice($value)
 */
class Storage extends Model
{
    protected $table = 'storage';
}
