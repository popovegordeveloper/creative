<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User withRole($role)
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string $email
 * @property string $password
 * @property int $is_activate
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsActivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @property string|null $activation_hash
 * @property-read mixed $activate_link
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereActivationHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User activated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User unactivated()
 * @property string|null $username
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @property-read \App\Models\UserSocialAccount $account
 */
class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'patronymic', 'is_activate', 'activation_hash'
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
     * Check user admin
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->hasRole('Admin')) {
            return true;
        }
        return false;
    }

    /*
    * Роли пользователя
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    /**
     * Активированные пользователи
     * @param $query
     * @return mixed
     */
    public function scopeActivated($query)
    {
        return $query->whereIsActivate(true);
    }

    /**
     * Неактивированные пользователи
     * @param $query
     * @return mixed
     */
    public function scopeUnactivated($query)
    {
        return $query->whereIsActivate(false);
    }

    /**
     * Новый пользователь из соцсети
     * @param $providerUser
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public static function createBySocialProvider($providerUser)
    {
        return self::create([
            'email' => $providerUser->getEmail(),
        ]);
    }

    /**
     * Аккаун соц сети
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account()
    {
        return $this->hasOne(UserSocialAccount::class);
    }



}
