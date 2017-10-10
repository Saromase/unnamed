<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inventory
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
 * @method void setAluminium($value)
 * @method void setCharcoal($value)
 * @method void setCopper($value)
 * @method void setCrudOil($value)
 * @method void setGold($value)
 * @method void setId($value)
 * @method void setIron($value)
 * @method void setNaturalGas($value)
 * @method void setRock($value)
 * @method void setSand($value)
 * @method void setWater($value)
 * @method void setWood($value)
 * @method int getAluminium()
 * @method int getCharcoal()
 * @method int getCopper()
 * @method int getCrudOil()
 * @method int getGold()
 * @method int getId()
 * @method int getIron()
 * @method int getNaturalGas()
 * @method int getRock()
 * @method int getSand()
 * @method int getWater()
 * @method int getWood()
 * @mixin \Eloquent
 */
class Inventory extends Model
{
    protected $table = 'inventory';


    /**
     * @param string $string
     * @param bool $capitalizeFirst
     * @return string
     */
    public static function dashesToCamelCase($string, $capitalizeFirst = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        $str = $capitalizeFirst ? $str : strtolower($str[0]);
        return $str;
    }
}
