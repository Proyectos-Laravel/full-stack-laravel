<?php

namespace App\Services\Frontend\UIElements\StatItems;

use App\Services\Frontend\UIElements\StatItems\Contracts\StatItem;

class StatDefault implements StatItem
{
    protected string $id;

    const COMPONENT = 'AppStat';

    public function __construct(
        protected readonly string $label,
        protected readonly string $value,
    ) {
        $this->id = \Str::uuid();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'component' => self::COMPONENT,
            'props' => [
                'label' => __($this->label),
                'value' => __($this->value),
            ],
        ];
    }
}
