<?php

namespace App\Models\Base;

use App\Traits\Models\CreatedBy;
use App\Traits\Models\DeletedBy;
use App\Traits\Models\UpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes, CreatedBy, UpdatedBy, DeletedBy;

    protected $table = 'attachments';

    protected $primaryKey = 'attachment_id';

    protected $fillable = [
        'attachable_id',
        'attachable_type',
        'name',
        'path',
        'size',
        'extension',
        'mime_type',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'attachment_id' => 'integer',
        'attachable_id' => 'integer',
        'attachable_type' => 'string',
        'name' => 'string',
        'path' => 'string',
        'size' => 'integer',
        'extension' => 'string',
        'mime_type' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
