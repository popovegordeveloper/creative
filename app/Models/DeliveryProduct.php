<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DeliveryProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $delivery_id
 * @property float $price
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryProduct whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryProduct whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Delivery $delivery
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryProduct whereProductId($value)
 */
class DeliveryProduct extends Model
{
    protected $table = 'delivery_product';

    /**
     * Способ доставки
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
