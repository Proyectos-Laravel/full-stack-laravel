<?php

namespace App\Actions\LessonTypes;

use App\Actions\Contracts\CreateAction;
use App\Models\LessonType;

final class CreateLessonTypeAction implements CreateAction
{
    public static function execute(array $data = []): LessonType
    {
        return LessonType::create([
            'name' => data_get($data, 'name'),
            'is_active' => data_get($data, 'is_active', false),
            'created_at' => data_get($data, 'created_at', now()),
        ]);
    }
}
