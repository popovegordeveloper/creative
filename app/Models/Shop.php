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
 */
class Shop extends Model
{
    protected $fillable = [
        'name', 'description_preview', 'logo', 'cover', 'city', 'description', 'return_conditions', 'master_logo', 'master_name', 'master_phone', 'slug'
    ];

    /**
     * Способы доставки
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class, 'delivery_shop', 'shop_id', 'delivery_id')->withPivot(['address', 'price']);
    }
}
