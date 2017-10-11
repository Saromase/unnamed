<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @method Carbon getCreatedAt()
 * @method string getEmail()
 * @method integer getId()
 * @method string getName()
 * @method string getPassword()
 * @method string getRememberToken()
 * @method Carbon getUpdatedAt()
 * @method User setCreatedAt($value)
 * @method User setEmail($value)
 * @method User setId($value)
 * @method User setName($value)
 * @method User setPassword($value)
 * @method User setRememberToken($value)
 * @method User setUpdatedAt($value)
 * @method static Builder whereCreatedAt($value)
 * @method static Builder whereEmail($value)
 * @method static Builder whereId($value)
 * @method static Builder whereName($value)
 * @method static Builder wherePassword($value)
 * @method static Builder whereRememberToken($value)
 * @method static Builder whereUpdatedAt($value)
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
     * @return UserStats|null
     */
    public function getUserStats()
    {
        return UserStats::whereUserId($this->getId())->first();
    }
}
