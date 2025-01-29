<?php

namespace App\Services\Frontend\UIElements\FormFields\SelectOptions\Contracts;

interface WithOptions
{
    public function getOptions(): array;
}
