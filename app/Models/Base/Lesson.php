<?php

namespace App\Models\Base;

use App\Traits\Models\CreatedBy;
use App\Traits\Models\DeletedBy;
use App\Traits\Models\HasSlug;
use App\Traits\Models\UpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes, HasSlug, CreatedBy, UpdatedBy, DeletedBy;

    protected $table = 'lessons';

    protected $primaryKey = 'lesson_id';

    protected $fillable = [
        'course_id',
        'lesson_type_id',
        'name',
        'slug',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'course_id' => 'int',
        'lesson_type_id' => 'int',
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'created_by' => 'int',
        'updated_by' => 'int',
        'deleted_by' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
