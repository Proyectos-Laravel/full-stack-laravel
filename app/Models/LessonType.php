<?php

namespace App\Models;

use App\Models\Builders\LessonTypeBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonType extends Base\LessonType
{
    public function newEloquentBuilder($query): LessonTypeBuilder
    {
        return new LessonTypeBuilder($query);
    }

    public function lesson(): HasMany
    {
        return $this->hasMany(Lesson::class, 'lesson_type_id', 'lesson_type_id');
    }
}
