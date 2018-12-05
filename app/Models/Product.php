<?php

namespace App\Models;

use App\Models\Color;
use Gloudemans\Shoppingcart\Contracts\Buyable;
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Color[] $colors
 * @property int $is_checked
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product checked()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereIsChecked($value)
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product active()
 */
class Product extends Model implements Buyable
{
    use Searchable;

    protected $fillable = [
        'photos', 'name', 'description', 'composition', 'price', 'sale_price', 'qty', 'address', 'shop_id', 'category_id', 'term_dispatch_id', 'viewed', 'is_checked', 'is_active'
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

    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->description;
    }

    /**
     * Get the price of the Buyable item.
     *
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        return $this->getPrice();
    }

    /**
     * Проверееные модератором
     * @param $query
     * @return mixed
     */
    public function scopeChecked($query)
    {
        return $query->whereIsChecked(true);
    }

    /**
     * Активный
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->whereIsActive(true);
    }
}
