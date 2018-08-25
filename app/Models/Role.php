<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

/**
 * App\Models\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $perms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @mixin \Eloquent
 */
class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];

    /**
     * Многие ко многим с пользователями
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}