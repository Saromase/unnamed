<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Products
 *
 * @property int $id
 * @property string $name
 * @property int $quantity
 * @property int $percentage
 * @property int $price
 * @property int $regeneration
 * @property int $supply_demand
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findBy(array $value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByName($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByPrice($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByRegeneration($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findBySupplyDemand($value)
 * @method static \App\Models\Products findOneBy(array $value)
 * @method static \App\Models\Products findOneById($value)
 * @method static \App\Models\Products findOneByName($value)
 * @method static \App\Models\Products findOneByPercentage($value)
 * @method static \App\Models\Products findOneByPrice($value)
 * @method static \App\Models\Products findOneByQuantity($value)
 * @method static \App\Models\Products findOneByRegeneration($value)
 * @method static \App\Models\Products findOneBySupplyDemand($value)
 * @method integer getId()
 * @method string getName()
 * @method integer getPercentage()
 * @method integer getPrice()
 * @method integer getQuantity()
 * @method integer getRegeneration()
 * @method integer getSupplyDemand()
 * @method \App\Models\Products setId($value)
 * @method \App\Models\Products setName($value)
 * @method \App\Models\Products setPercentage($value)
 * @method \App\Models\Products setPrice($value)
 * @method \App\Models\Products setQuantity($value)
 * @method \App\Models\Products setRegeneration($value)
 * @method \App\Models\Products setSupplyDemand($value)
 * @mixin \Eloquent
 */
class Products extends CustomModel
{
    protected $table = 'products';
    
    public $timestamp = false;
    
    public function genSupply(){
        return $this->setSupplyDemand(rand(-100,100));
    }
}
