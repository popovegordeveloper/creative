<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DeliveryShop
 *
 * @property int $id
 * @property int $shop_id
 * @property int $delivery_id
 * @property float $price
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeliveryShop extends Model
{
    protected $table = 'delivery_shop';

    /**
     * Способ доставки
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

}
