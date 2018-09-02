<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Vacancy
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $preview_description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy wherePreviewDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Vacancy extends Model
{
    protected $fillable = ['name', 'description', 'preview_description'];
}
