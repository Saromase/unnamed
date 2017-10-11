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
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method \Carbon\Carbon getCreatedAt()
 * @method string getEmail()
 * @method integer getId()
 * @method string getName()
 * @method string getPassword()
 * @method string getRememberToken()
 * @method \Carbon\Carbon getUpdatedAt()
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\User setCreatedAt($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\User setEmail($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\User setId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\User setName($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\User setPassword($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\User setRememberToken($value)
 * @method \Illuminate\Database\Eloquent\Builder|\App\Models\User setUpdatedAt($value)
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
}
