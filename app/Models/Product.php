<?php

namespace App\Models;

use App\Modles\Color;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

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
 * @property string|null $address
 * @property int $viewed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereViewed($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modles\Color[] $colors
 */
class Product extends Model
{
    use Searchable;

    protected $fillable = [
        'photos', 'name', 'description', 'composition', 'price', 'sale_price', 'qty', 'address', 'shop_id', 'category_id', 'term_dispatch_id', 'viewed'
    ];

    protected $casts = [
        'photos' => 'array'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'name' => null,
        ];
    }


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
        return $this->belongsToMany(Delivery::class, 'delivery_product', 'product_id', 'delivery_id')->withPivot(['price']);
    }

    /**
     * Теккущая цена
     * @return float
     */
    public function getPrice()
    {
        return $this->sale_price ? $this->sale_price : $this->price;
    }

    /**
     * Цвета товара
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
    }

}
