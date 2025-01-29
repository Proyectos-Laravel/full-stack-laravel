<?php

namespace App\Traits\Models;

trait CreatedBy
{
    public static function bootCreatedBy(): void
    {
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by = auth()->id();
            }
        });
    }
}
