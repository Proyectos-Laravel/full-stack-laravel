<?php

namespace App\Models\Builders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
    protected $model = User::class;

    public function active(): self
    {
        return $this->where('is_active', true);
    }

    public function admins(): self
    {
        return $this->where('is_admin', true);
    }
}
