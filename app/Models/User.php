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
 * @property-read \App\Models\Shop $shop
 * @property-read string $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $favorite
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $index
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhone($value)
 * @property int $sex
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSex($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
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
        'name', 'email', 'password', 'surname', 'patronymic', 'is_activate', 'activation_hash', 'index', 'address', 'phone', 'sex'
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

    /**
     * Магазин
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    /**
     * ФИО
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "$this->name $this->patronymic $this->surname";
    }

    /**
     * Избранные товары
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favorite()
    {
        return $this->belongsToMany(Product::class, 'favorite_product', 'user_id', 'product_id');
    }

    /**
     * Заказы
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class)->with('status');
    }

    /**
     * Купленные товары
     * @param $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPurchasesAttribute($query)
    {
        return $this->orders->where('status_id', 6);
    }

    /**
     * Сумма купленных товаров
     * @return float|int
     */
    public function getPurchasedSumAttribute()
    {
        return $this->purchases->sum('price');
    }

    /**
     * Кол-во купленных товаров
     * @return float|int
     */
    public function getPurchasedCountAttribute()
    {
        $count = 0;
        foreach ($this->purchases as $purchase){
            $item = unserialize($purchase->product);
            $count += $item->qty;
        }
        return $count;
    }

    /**
     * Текущию заказы
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCurrentlyOrdersAttribute()
    {
        return $this->orders->whereIn('status_id', [1,2,3,4]);
    }

    /**
     * Отмененные заказы
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCanceledOrdersAttribute()
    {
        return $this->orders->where('status_id', 5);
    }

    /**
     * Завершенные заказы
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCompletedOrdersAttribute()
    {
        return $this->orders->where('status_id', 6);
    }

    /**
     * Новые сообщения для пользователя
     * @return Message[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getNewMessagesAttribute()
    {
        return Message::where('is_new', true)
            ->where('user_id', '!=', $this->id)
            ->whereHas('conversation', function ($query){
            return $query->where('user1_id', $this->id)->orWhere('user2_id', $this->id);
        })->get();
    }

}
