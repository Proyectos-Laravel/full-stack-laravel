<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

class Attachment extends Base\Attachment
{
    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }
}
