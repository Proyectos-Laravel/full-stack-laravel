<?php

namespace App\Actions\LessonTypes;

use App\Actions\Contracts\UpdateAction;
use App\Models\LessonType;

final class UpdateLessonTypeAction implements UpdateAction
{
    public static function execute(int $id, array $data = []): void
    {
        $lessonType = LessonType::findOrFail($id);

        $lessonType->update([
            'name' => data_get($data, 'name'),
            'is_active' => data_get($data, 'is_active'),
            'created_at' => data_get($data, 'created_at'),
        ]);
    }
}
