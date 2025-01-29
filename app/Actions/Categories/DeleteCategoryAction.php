<?php

namespace App\Actions\Categories;

use App\Actions\Contracts\DeleteAction;
use App\Models\Category;

final class DeleteCategoryAction implements DeleteAction
{
    public static function execute(int $id): void
    {
        Category::findOrFail($id)?->delete();
    }
}
