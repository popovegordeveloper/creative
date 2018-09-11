<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Conversation
 *
 * @property int $id
 * @property int $user1_id
 * @property int $user2_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation forUser($user_id)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereUser1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereUser2Id($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $messages
 */
class Conversation extends Model
{
    protected $fillable = ['user1_id', 'user2_id'];

    /**
     * Чат для юзера
     * @param $query
     * @param $user_id
     * @return mixed
     */
    public function scopeForUser($query, $user_id)
    {
        return $query->where('user1_id', $user_id)->orWhere('user2_id', $user_id);
    }

    /**
     * Сообщения
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Собеседник
     * @param $user_id
     * @return User|User[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function getCompanion($user_id)
    {
        $companion_id = $this->user1_id == $user_id ? $this->user2_id : $this->user1_id;
        return User::find($companion_id);
    }
}
