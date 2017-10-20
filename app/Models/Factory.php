<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserFactory;

/**
 * App\Models\Factory
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Factory[] findBy(array $value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Factory[] findByCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Factory[] findByName($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\Factory[] findByUpdatedAt($value)
 * @method static \App\Models\Factory findOneBy(array $value)
 * @method static \App\Models\Factory findOneByCreatedAt($value)
 * @method static \App\Models\Factory findOneById($value)
 * @method static \App\Models\Factory findOneByName($value)
 * @method static \App\Models\Factory findOneByUpdatedAt($value)
 * @method \Carbon\Carbon getCreatedAt()
 * @method integer getId()
 * @method string getName()
 * @method \Carbon\Carbon getUpdatedAt()
 * @method \App\Models\Factory setCreatedAt($value)
 * @method \App\Models\Factory setId($value)
 * @method \App\Models\Factory setName($value)
 * @method \App\Models\Factory setUpdatedAt($value)
 * @mixin \Eloquent
 */
class Factory extends Model
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
