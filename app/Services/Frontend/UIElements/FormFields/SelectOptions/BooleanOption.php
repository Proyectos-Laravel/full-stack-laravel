<?php

namespace App\Services\Frontend\UIElements\FormFields\SelectOptions;

class BooleanOption implements Contracts\WithOptions
{
    public function getOptions(): array
    {
        return [
            [
                'text' => __('Sí'),
                'value' => 1,
            ],
            [
                'text' => __('No'),
                'value' => 0,
            ],
        ];
    }
}
