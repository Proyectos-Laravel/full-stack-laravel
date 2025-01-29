<?php

namespace App\Filters\LessonType;

use App\Filters\BaseSorterFilter;

final class SorterFilter extends BaseSorterFilter
{
    public array $availableColumnSorters = [
        'name', 'is_active', 'created_at',
    ];

    public string $primaryKey = 'lesson_type_id';
}
