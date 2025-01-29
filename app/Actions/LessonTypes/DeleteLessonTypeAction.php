<?php

namespace App\Actions\LessonTypes;

use App\Actions\Contracts\DeleteAction;
use App\Models\LessonType;

final class DeleteLessonTypeAction implements DeleteAction
{
    public static function execute(int $id): void
    {
        LessonType::findOrFail($id)?->delete();
    }
}
