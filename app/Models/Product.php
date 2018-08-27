<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property array $photos
 * @property string $name
 * @property string $description
 * @property string $composition
 * @property float $price
 * @property float $sale_price
 * @property int|null $qty
 * @property int $shop_id
 * @property int $category_id
 * @property int $term_dispatch_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Delivery[] $deliveries
 * @property-read \App\Models\Shop $shop
 * @property-read \App\Models\TermDispatch $termDispatch
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereComposition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTermDispatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $fillable = [
        'photos', 'name', 'description', 'composition', 'price', 'sale_price', 'qty'
    ];

    protected $casts = [
        'photos' => 'array'
    ];

    /**
     * Магазин
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Категория
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Время доставки
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function termDispatch()
    {
        return $this->belongsTo(TermDispatch::class);
    }

    /**
     * Способы доставки
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class, 'delivery_product', 'product_id', 'delivery_id');
    }

    /**
     * Цена с учетом скидки
     * @return float
     */
    public function getCostAttribute()
    {
        return $this->price - $this->sale_price;
    }

}
