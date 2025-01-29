<?php

namespace App\Traits\Models;

trait UpdatedBy
{
    public static function bootUpdatedBy(): void
    {
        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });
    }
}
