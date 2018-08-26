<?php

namespace App\Models;

use Baum\Node;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_category
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereParentCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereIsActive($value)
 * @property string|null $slug
 * @property int|null $parent_category_id
 * @property int|null $lft
 * @property int|null $rgt
 * @property int|null $depth
 * @property-read \Baum\Extensions\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read \App\Models\Category|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node limitDepth($limit)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereParentCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutNode($node)
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutRoot()
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutSelf()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category active()
 */
class Category extends Node
{
    protected $table = 'categories';

    protected $parentColumn = 'parent_category_id';

    protected $fillable = ['name', 'parent_category_id', 'is_active', 'slug'];

    /**
     * Активные категории
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->whereIsActive(true);
    }

}
