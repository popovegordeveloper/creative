<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserSocialAccount
 *
 * @property int $id
 * @property string $provider_user_id
 * @property string $provider
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
class UserSocialAccount extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    protected $table = 'user_social_accounts';

    /**
     * Пользователь
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
