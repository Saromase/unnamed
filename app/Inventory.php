<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Inventory
 *
 * @property int $id
 * @property int $water
 * @property int $rock
 * @property int $natural_gas
 * @property int $crud_oil
 * @property int $aluminium
 * @property int $gold
 * @property int $iron
 * @property int $copper
 * @property int $sand
 * @property int $charcoal
 * @property int $wood
 * @method static Builder|Inventory whereAluminium($value)
 * @method static Builder|Inventory whereCharcoal($value)
 * @method static Builder|Inventory whereCopper($value)
 * @method static Builder|Inventory whereCrudOil($value)
 * @method static Builder|Inventory whereGold($value)
 * @method static Builder|Inventory whereId($value)
 * @method static Builder|Inventory whereIron($value)
 * @method static Builder|Inventory whereNaturalGas($value)
 * @method static Builder|Inventory whereRock($value)
 * @method static Builder|Inventory whereSand($value)
 * @method static Builder|Inventory whereWater($value)
 * @method static Builder|Inventory whereWood($value)
 * @mixin \Eloquent
 */
class Inventory extends Model
{
    protected $table = 'inventory';
}
