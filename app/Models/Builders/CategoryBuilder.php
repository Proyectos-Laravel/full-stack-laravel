<?php

namespace App\Models\Builders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryBuilder extends Builder
{
    protected $model = Category::class;

    public function active(): self
    {
        return $this->where('is_active', true);
    }
}
