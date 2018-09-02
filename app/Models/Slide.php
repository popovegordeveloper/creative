<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slide
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereUrl($value)
 * @mixin \Eloquent
 */
class Slide extends Model
{
    protected $fillable = ['name', 'description', 'image', 'url'];
}
