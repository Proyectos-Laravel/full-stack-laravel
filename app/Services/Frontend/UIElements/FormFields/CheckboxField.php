<?php

namespace App\Services\Frontend\UIElements\FormFields;

class CheckboxField implements Contracts\Field
{
    const COMPONENT = 'AppCheckboxField';

    const CSS_FIELD_CLASS = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600';

    const CSS_LABEL_CLASS = 'ms-2 text-sm font-medium text-gray-900 dark:text-gray-300';

    public function __construct(
        protected string $name,
        protected string $label,
        protected string $placeholder = '',
        protected bool $defaultValue = false,
    ) {}

    public function generate(): array
    {
        return [
            'uuid' => \Str::uuid(),
            'component' => self::COMPONENT,
            'props' => [
                'name' => $this->name,
                'label' => __($this->label),
                'cssFieldClass' => self::CSS_FIELD_CLASS,
                'cssLabelClass' => self::CSS_LABEL_CLASS,
                'defaultValue' => $this->defaultValue,
            ],
        ];
    }
}
