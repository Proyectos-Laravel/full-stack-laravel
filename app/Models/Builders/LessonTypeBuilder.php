<?php

namespace App\Models\Builders;

use App\Models\LessonType;
use Illuminate\Database\Eloquent\Builder;

class LessonTypeBuilder extends Builder
{
    protected $model = LessonType::class;

    public function active(): self
    {
        return $this->where('is_active', true);
    }
}
