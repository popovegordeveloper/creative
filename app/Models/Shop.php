<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop
 *
 * @property int $id
 * @property string $name
 * @property string $description_preview
 * @property string $logo
 * @property string $cover
 * @property string $city
 * @property string|null $description
 * @property string|null $return_conditions
 * @property string $master_logo
 * @property string $master_name
 * @property string $master_phone
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Delivery[] $deliveries
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereDescriptionPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereMasterLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereMasterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereMasterPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereReturnConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $address
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereAddress($value)
 * @property int $user_id
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property int $is_user_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereIsUserActive($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 */
class Shop extends Model
{
    protected $fillable = [
        'name', 'description_preview', 'logo', 'cover', 'city', 'description', 'return_conditions', 'master_logo', 'master_name', 'master_phone', 'slug', 'address', 'user_id', 'is_user_active'
    ];

    /**
     * Способы доставки
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class, 'delivery_shop', 'shop_id', 'delivery_id')->withPivot(['price']);
    }

    /**
     * Владелец магазина
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Товары
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class)->where('is_checked', true);
    }

    /**
     * Способы оплаты
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_shop', 'shop_id', 'payment_id');
    }

    public function getPaymentsForDescriptionProduct()
    {
        $payments = $this->payments->pluck('name')->toArray();
        return implode(", ", $payments);
    }

    public function getDeliveriesForDescriptionProduct()
    {
        $payments = $this->deliveries->pluck('name')->toArray();
        return implode(", ", $payments);
    }

    /**
     * Заказы
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
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
}
