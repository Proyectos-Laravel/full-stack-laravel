<?php

namespace App\Services\Frontend\UIElements\Buttons;

use Illuminate\Support\Str;

class Button implements Contracts\Button
{
    public function __construct(
        protected readonly string $label,
        protected readonly string $action,
        protected readonly string $icon,
        protected readonly string $class,
    ) {
    }

    public function generate(): array
    {
        return [
            'id' => Str::uuid(),
            'label' => __($this->label),
            'action' => $this->action,
            'icon' => $this->icon,
            'class' => $this->class,
        ];
    }
}
