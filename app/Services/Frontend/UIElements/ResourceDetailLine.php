<?php

namespace App\Services\Frontend\UIElements;

use Exception;

final class ResourceDetailLine
{
    public function __construct(
        protected readonly string $columnName,
        protected readonly ?string $label = null,
        protected readonly ?string $icon = null,
        protected readonly bool $isBoolean = false,
    )
    {}

    /**
     * @throws Exception
     */
    public function generate(): array
    {
        if (! $this->label && ! $this->icon) {
            throw new Exception('You must provide a label or an icon');
        }

        return array_filter([
            'column_name' => $this->columnName,
            'icon' => $this->icon,
            'label' => __($this->label),
            'is_boolean' => $this->isBoolean,
        ], fn ($value) => $value !== null);
    }
}
