<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Base\User
{
    public function newEloquentBuilder($query): Builders\UserBuilder
    {
        return new Builders\UserBuilder($query);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'owner_id', 'user_id');
    }

    public function getRedirectUrl(): string
    {
        return match ($this->is_admin) {
            true => route('backoffice.dashboard.index'),
            false => route('dashboard'),
        };
    }
}
