<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\UserFactory
 *
 * @property int $id
 * @property string $name
 * @property int $level
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\UserFactory[] findBy(array $value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\UserFactory[] findByCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\UserFactory[] findByLevel($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\UserFactory[] findByName($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\UserFactory[] findByUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\UserFactory[] findByUserId($value)
 * @method static \App\Models\UserFactory findOneBy(array $value)
 * @method static \App\Models\UserFactory findOneByCreatedAt($value)
 * @method static \App\Models\UserFactory findOneById($value)
 * @method static \App\Models\UserFactory findOneByLevel($value)
 * @method static \App\Models\UserFactory findOneByName($value)
 * @method static \App\Models\UserFactory findOneByUpdatedAt($value)
 * @method static \App\Models\UserFactory findOneByUserId($value)
 * @method \Carbon\Carbon getCreatedAt()
 * @method integer getId()
 * @method integer getLevel()
 * @method string getName()
 * @method \Carbon\Carbon getUpdatedAt()
 * @method integer getUserId()
 * @method \App\Models\UserFactory setCreatedAt($value)
 * @method \App\Models\UserFactory setId($value)
 * @method \App\Models\UserFactory setLevel($value)
 * @method \App\Models\UserFactory setName($value)
 * @method \App\Models\UserFactory setUpdatedAt($value)
 * @method \App\Models\UserFactory setUserId($value)
 * @mixin \Eloquent
 */
class UserFactory extends CustomModel
{
    protected $table = 'user_factory';
}
