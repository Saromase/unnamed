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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $money
 * @property int $inventory_size
 * @property int $storage_id
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @method static Collection|User[] findBy(array $value)
 * @method static Collection|User[] findByCreatedAt($value)
 * @method static Collection|User[] findByEmail($value)
 * @method static Collection|User[] findByInventorySize($value)
 * @method static Collection|User[] findByMoney($value)
 * @method static Collection|User[] findByName($value)
 * @method static Collection|User[] findByPassword($value)
 * @method static Collection|User[] findByRememberToken($value)
 * @method static Collection|User[] findByStorageId($value)
 * @method static Collection|User[] findByUpdatedAt($value)
 * @method static User findOneBy(array $value)
 * @method static User findOneByCreatedAt($value)
 * @method static User findOneByEmail($value)
 * @method static User findOneById($value)
 * @method static User findOneByInventorySize($value)
 * @method static User findOneByMoney($value)
 * @method static User findOneByName($value)
 * @method static User findOneByPassword($value)
 * @method static User findOneByRememberToken($value)
 * @method static User findOneByStorageId($value)
 * @method static User findOneByUpdatedAt($value)
 * @method static Collection|User[] get($columns = [])
 * @method Carbon getCreatedAt()
 * @method string getEmail()
 * @method integer getId()
 * @method integer getInventorySize()
 * @method integer getMoney()
 * @method string getName()
 * @method string getPassword()
 * @method string getRememberToken()
 * @method integer getStorageId()
 * @method Carbon getUpdatedAt()
 * @method User setCreatedAt($value)
 * @method User setEmail($value)
 * @method User setId($value)
 * @method User setInventorySize($value)
 * @method User setMoney($value)
 * @method User setName($value)
 * @method User setPassword($value)
 * @method User setRememberToken($value)
 * @method User setStorageId($value)
 * @method User setUpdatedAt($value)
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

    /**
     * @param int $nb
     * @return User
     */
    public function subInventorySize($nb)
    {
        return $this->setInventorySize($this->getInventorySize() - $nb);
    }
}
