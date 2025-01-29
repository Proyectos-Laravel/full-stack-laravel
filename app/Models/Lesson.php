<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Base\Lesson
{
    public function lessonType(): BelongsTo
    {
        return $this->belongsTo(LessonType::class, 'lesson_type_id', 'lesson_type_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}
