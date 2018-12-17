<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoryQuestion
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoryQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoryQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoryQuestion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CategoryQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 */
class CategoryQuestion extends Model
{
    protected $table = "category_question";

    /**
     * Вопросы
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
