<?php

namespace App\Models;

use Carbon\Carbon;
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
 * @property string $color
 * @property int $tier
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Collection|Products[] findBy(array $value)
 * @method static Collection|Products[] findByColor($value)
 * @method static Collection|Products[] findByCreatedAt($value)
 * @method static Collection|Products[] findByMedianPrice($value)
 * @method static Collection|Products[] findByName($value)
 * @method static Collection|Products[] findByPercentage($value)
 * @method static Collection|Products[] findByPrice($value)
 * @method static Collection|Products[] findByQuantity($value)
 * @method static Collection|Products[] findByRegeneration($value)
 * @method static Collection|Products[] findBySupplyDemand($value)
 * @method static Collection|Products[] findByTier($value)
 * @method static Collection|Products[] findByUpdatedAt($value)
 * @method static Products findOneBy(array $value)
 * @method static Products findOneByColor($value)
 * @method static Products findOneByCreatedAt($value)
 * @method static Products findOneById($value)
 * @method static Products findOneByMedianPrice($value)
 * @method static Products findOneByName($value)
 * @method static Products findOneByPercentage($value)
 * @method static Products findOneByPrice($value)
 * @method static Products findOneByQuantity($value)
 * @method static Products findOneByRegeneration($value)
 * @method static Products findOneBySupplyDemand($value)
 * @method static Products findOneByTier($value)
 * @method static Products findOneByUpdatedAt($value)
 * @method static Collection|Products[] get($columns = [])
 * @method string getColor()
 * @method Carbon getCreatedAt()
 * @method integer getId()
 * @method integer getMedianPrice()
 * @method string getName()
 * @method integer getPercentage()
 * @method integer getPrice()
 * @method integer getQuantity()
 * @method integer getRegeneration()
 * @method integer getSupplyDemand()
 * @method integer getTier()
 * @method Carbon getUpdatedAt()
 * @method Products setColor($value)
 * @method Products setCreatedAt($value)
 * @method Products setId($value)
 * @method Products setMedianPrice($value)
 * @method Products setName($value)
 * @method Products setPercentage($value)
 * @method Products setPrice($value)
 * @method Products setQuantity($value)
 * @method Products setRegeneration($value)
 * @method Products setSupplyDemand($value)
 * @method Products setTier($value)
 * @method Products setUpdatedAt($value)
 * @mixin \Eloquent
 */
class Products extends CustomModel
{
    protected $table = 'products';

    public $timestamp = false;

    /**
     * @return Products
     */
    public function genSupply()
    {
        return $this->setSupplyDemand(rand(-50, 50));
    }
}
