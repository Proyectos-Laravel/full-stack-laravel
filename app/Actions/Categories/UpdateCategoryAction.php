<?php

namespace App\Actions\Categories;

use App\Actions\Contracts\UpdateAction;
use App\Models\Category;

final class UpdateCategoryAction implements UpdateAction
{
    public static function execute(int $id, array $data = []): void
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => data_get($data, 'name'),
            'description' => data_get($data, 'description'),
            'is_active' => data_get($data, 'is_active'),
            'created_at' => data_get($data, 'created_at'),
        ]);
    }
}
