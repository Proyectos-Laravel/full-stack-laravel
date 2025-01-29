<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;

class Course extends Base\Course
{
    public function newEloquentBuilder($query): Builders\CourseBuilder
    {
        return new Builders\CourseBuilder($query);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'user_id');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id', 'course_id');
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Storage::url($this->attachments()->first()?->path) ?? null;
            }
        );
    }
}
