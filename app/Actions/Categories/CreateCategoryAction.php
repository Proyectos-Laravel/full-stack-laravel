<?php

namespace App\Actions\Categories;

use App\Actions\Contracts\CreateAction;
use App\Models\Category;

final class CreateCategoryAction implements CreateAction
{
    public static function execute(array $data = []): Category
    {
        return Category::create([
            'name' => data_get($data, 'name'),
            'description' => data_get($data, 'description'),
            'is_active' => data_get($data, 'is_active', false),
            'created_at' => data_get($data, 'created_at', now()),
        ]);
    }
}
