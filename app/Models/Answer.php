<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Answer
 *
 * @property int $id
 * @property string $text
 * @property int $question_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Question $question
 */
class Answer extends Model
{
    /**
     * Вопрос
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
