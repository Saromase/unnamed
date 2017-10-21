<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Factory
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Collection|Factory[] findBy(array $value)
 * @method static Collection|Factory[] findByCreatedAt($value)
 * @method static Collection|Factory[] findByName($value)
 * @method static Collection|Factory[] findByUpdatedAt($value)
 * @method static Factory findOneBy(array $value)
 * @method static Factory findOneByCreatedAt($value)
 * @method static Factory findOneById($value)
 * @method static Factory findOneByName($value)
 * @method static Factory findOneByUpdatedAt($value)
 * @method Carbon getCreatedAt()
 * @method integer getId()
 * @method string getName()
 * @method Carbon getUpdatedAt()
 * @method Factory setCreatedAt($value)
 * @method Factory setId($value)
 * @method Factory setName($value)
 * @method Factory setUpdatedAt($value)
 * @mixin \Eloquent
 */
class Factory extends CustomModel
{
    protected $table = 'factory';

    public function getFactoryPrice($id){
        $user = $this->getUser();
        $factory = UserFactory::findByUserId($id)->findOneById($id);
        if ($factory = []){
            return 20000;
        } else {
            return 20000 * ($factory->level * 2.5);
        }
    }
}
