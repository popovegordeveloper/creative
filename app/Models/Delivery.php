<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Delivery
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop[] $shops
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Delivery extends Model
{
    protected $fillable = [
        'name', 'price', 'address'
    ];

    /**
     * Магазины
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'delivery_shop', 'delivery_id', 'shop_id');
    }
}
