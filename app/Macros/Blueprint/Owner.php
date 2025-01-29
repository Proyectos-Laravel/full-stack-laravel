<?php

namespace App\Macros\Blueprint;

use Illuminate\Database\Schema\Blueprint;

final class Owner
{
    /**
     * Add the `owner_id` column to the table.
     */
    public function __invoke(): void
    {
        Blueprint::macro('owner', function (string $ownerTable = 'users', string $ownerColumn = 'user_id') {
            $this->unsignedBigInteger('owner_id')->nullable();

            $this->foreign('owner_id')
                ->references($ownerColumn)
                ->on($ownerTable);
        });
    }
}
