<?php

namespace App\Services\Frontend\UIElements\ColumnItems;

final class ActionColumn
{
    public function __construct(
        protected readonly string $label,
        protected readonly string $class,
        protected readonly string $event,
    ) {}

    public function generate(): array
    {
        return [
            'label' => __($this->label),
            'class' => $this->class,
            'event' => $this->event,
        ];
    }
}
