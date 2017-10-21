<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\UserFactory
 *
 * @property int $id
 * @property string $name
 * @property int $factory_id
 * @property int $level
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Collection|UserFactory[] findBy(array $value)
 * @method static Collection|UserFactory[] findByCreatedAt($value)
 * @method static Collection|UserFactory[] findByFactoryId($value)
 * @method static Collection|UserFactory[] findByLevel($value)
 * @method static Collection|UserFactory[] findByName($value)
 * @method static Collection|UserFactory[] findByUpdatedAt($value)
 * @method static Collection|UserFactory[] findByUserId($value)
 * @method static UserFactory findOneBy(array $value)
 * @method static UserFactory findOneByCreatedAt($value)
 * @method static UserFactory findOneByFactoryId($value)
 * @method static UserFactory findOneById($value)
 * @method static UserFactory findOneByLevel($value)
 * @method static UserFactory findOneByName($value)
 * @method static UserFactory findOneByUpdatedAt($value)
 * @method static UserFactory findOneByUserId($value)
 * @method static Collection|UserFactory[] get($columns = [])
 * @method Carbon getCreatedAt()
 * @method integer getFactoryId()
 * @method integer getId()
 * @method integer getLevel()
 * @method string getName()
 * @method Carbon getUpdatedAt()
 * @method integer getUserId()
 * @method UserFactory setCreatedAt($value)
 * @method UserFactory setFactoryId($value)
 * @method UserFactory setId($value)
 * @method UserFactory setLevel($value)
 * @method UserFactory setName($value)
 * @method UserFactory setUpdatedAt($value)
 * @method UserFactory setUserId($value)
 * @mixin \Eloquent
 */
class UserFactory extends CustomModel
{
    protected $table = 'user_factory';
}
