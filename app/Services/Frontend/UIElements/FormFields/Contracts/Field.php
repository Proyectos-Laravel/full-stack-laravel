<?php

namespace App\Services\Frontend\UIElements\FormFields\Contracts;

interface Field
{
    public function generate(): array;
}
