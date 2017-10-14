<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $money
 * @property int $inventory_size
 * @property int $storage_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findBy(array $value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByEmail($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByInventorySize($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByMoney($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByName($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByPassword($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByStorageId($value)
 * @method static \Illuminate\Database\Eloquent\Collection|\App\Models\User[] findByUpdatedAt($value)
 * @method static \App\Models\User findOneBy(array $value)
 * @method static \App\Models\User findOneByCreatedAt($value)
 * @method static \App\Models\User findOneByEmail($value)
 * @method static \App\Models\User findOneById($value)
 * @method static \App\Models\User findOneByInventorySize($value)
 * @method static \App\Models\User findOneByMoney($value)
 * @method static \App\Models\User findOneByName($value)
 * @method static \App\Models\User findOneByPassword($value)
 * @method static \App\Models\User findOneByRememberToken($value)
 * @method static \App\Models\User findOneByStorageId($value)
 * @method static \App\Models\User findOneByUpdatedAt($value)
 * @method \Carbon\Carbon getCreatedAt()
 * @method string getEmail()
 * @method integer getId()
 * @method integer getInventorySize()
 * @method integer getMoney()
 * @method string getName()
 * @method string getPassword()
 * @method string getRememberToken()
 * @method integer getStorageId()
 * @method \Carbon\Carbon getUpdatedAt()
 * @method \App\Models\User setCreatedAt($value)
 * @method \App\Models\User setEmail($value)
 * @method \App\Models\User setId($value)
 * @method \App\Models\User setInventorySize($value)
 * @method \App\Models\User setMoney($value)
 * @method \App\Models\User setName($value)
 * @method \App\Models\User setPassword($value)
 * @method \App\Models\User setRememberToken($value)
 * @method \App\Models\User setStorageId($value)
 * @method \App\Models\User setUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends CustomModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Notifiable, Authenticatable, Authorizable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return Collection|Inventory[]
     */
    public function getInventory()
    {
        return Inventory::findByUserId($this->getId());
    }

    /**
     * @return Storage|null
     */
    public function getStorage()
    {
        return Storage::findOneById($this->storage_id);
    }

    /**
     * @param int $nb
     * @return User
     */
    public function subMoney($nb)
    {
        return $this->setMoney($this->getMoney() - $nb);
    }

    /**
     * @param int $nb
     * @return User
     */
    public function addMoney($nb)
    {
        return $this->setMoney($this->getMoney() + $nb);
    }

    /**
     * @param int $nb
     * @return User
     */
    public function addInventorySize($nb)
    {
        return $this->setInventorySize($this->getInventorySize() + $nb);
    }
}
