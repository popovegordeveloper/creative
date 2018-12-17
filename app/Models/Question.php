<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property string $text
 * @property int $category_question_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question whereCategoryQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer $answer
 * @property-read \App\Models\CategoryQuestion $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question category1()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question category2()
 */
class Question extends Model
{
    /**
     * Ответы
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    /**
     * Категория
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoryQuestion::class, 'category_question_id');
    }

    /**
     * Вопросы первой категории
     * @param $query
     * @return mixed
     */
    public function scopeCategory1($query)
    {
        return $query->where('category_question_id', 1);
    }

    /**
     * Вопросы второй категории
     * @param $query
     * @return mixed
     */
    public function scopeCategory2($query)
    {
        return $query->where('category_question_id', 2);
    }
}
