<?php

namespace App\Services\Frontend\UIElements\ColumnItems\Contracts;

interface ColumnItem
{
    public function generate(): array;
}
