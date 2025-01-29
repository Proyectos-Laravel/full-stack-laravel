<?php

namespace App\Models\Base;

use App\Traits\Models\CreatedBy;
use App\Traits\Models\DeletedBy;
use App\Traits\Models\HasSlug;
use App\Traits\Models\UpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonType extends Model
{
    use SoftDeletes, HasSlug, CreatedBy, UpdatedBy, DeletedBy;

    protected $table = 'lesson_types';

    protected $primaryKey = 'lesson_type_id';

    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'lesson_type_id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'is_active' => 'boolean',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
