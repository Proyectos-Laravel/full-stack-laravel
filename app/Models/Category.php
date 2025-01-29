<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Base\Category
{
    public function newEloquentBuilder($query): Builders\CategoryBuilder
    {
        return new Builders\CategoryBuilder($query);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'category_id', 'category_id');
    }
}
