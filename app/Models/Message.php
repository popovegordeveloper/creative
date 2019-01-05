<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $text
 * @property int $conversation_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property string|null $file
 * @property string|null $filename
 * @property string $date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUserId($value)
 */
class Message extends Model
{
    protected $fillable = ['text', 'user_id', 'date', 'file', 'filename', 'is_new'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * диалог
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

}
