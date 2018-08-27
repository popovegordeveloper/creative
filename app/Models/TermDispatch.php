<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TermDispatch
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TermDispatch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TermDispatch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TermDispatch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TermDispatch whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TermDispatch extends Model
{
    protected $fillable = ['name'];

    /**
     * Товары
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
