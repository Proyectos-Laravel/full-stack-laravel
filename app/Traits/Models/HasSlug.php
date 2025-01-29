<?php

namespace App\Traits\Models;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
