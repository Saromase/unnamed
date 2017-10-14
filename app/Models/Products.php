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
 * @property int $median_price
 * @property int $price
 * @property int $regeneration
 * @property int $supply_demand
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findBy(array $value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByMedianPrice($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByName($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByPrice($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByRegeneration($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findBySupplyDemand($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] findByUpdatedAt($value)
 * @method static \App\Models\Products findOneBy(array $value)
 * @method static \App\Models\Products findOneByCreatedAt($value)
 * @method static \App\Models\Products findOneById($value)
 * @method static \App\Models\Products findOneByMedianPrice($value)
 * @method static \App\Models\Products findOneByName($value)
 * @method static \App\Models\Products findOneByPercentage($value)
 * @method static \App\Models\Products findOneByPrice($value)
 * @method static \App\Models\Products findOneByQuantity($value)
 * @method static \App\Models\Products findOneByRegeneration($value)
 * @method static \App\Models\Products findOneBySupplyDemand($value)
 * @method static \App\Models\Products findOneByUpdatedAt($value)
 * @method \Carbon\Carbon getCreatedAt()
 * @method integer getId()
 * @method integer getMedianPrice()
 * @method string getName()
 * @method integer getPercentage()
 * @method integer getPrice()
 * @method integer getQuantity()
 * @method integer getRegeneration()
 * @method integer getSupplyDemand()
 * @method \Carbon\Carbon getUpdatedAt()
 * @method \App\Models\Products setCreatedAt($value)
 * @method \App\Models\Products setId($value)
 * @method \App\Models\Products setMedianPrice($value)
 * @method \App\Models\Products setName($value)
 * @method \App\Models\Products setPercentage($value)
 * @method \App\Models\Products setPrice($value)
 * @method \App\Models\Products setQuantity($value)
 * @method \App\Models\Products setRegeneration($value)
 * @method \App\Models\Products setSupplyDemand($value)
 * @method \App\Models\Products setUpdatedAt($value)
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
