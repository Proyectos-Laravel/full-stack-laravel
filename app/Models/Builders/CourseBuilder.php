<?php

namespace App\Models\Builders;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;

class CourseBuilder extends Builder
{
    protected $model = Course::class;

    public function active(): self
    {
        return $this->where('is_active', true);
    }
}
