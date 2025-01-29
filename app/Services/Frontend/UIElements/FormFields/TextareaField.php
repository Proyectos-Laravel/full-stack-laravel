<?php

namespace App\Services\Frontend\UIElements\FormFields;

class TextareaField implements Contracts\Field
{
    const COMPONENT = 'AppTextareaField';

    const CSS_LABEL_CLASS = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';

    const CSS_FIELD_CLASS = 'block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';

    public function __construct(
        protected string $name,
        protected string $label,
        protected string $placeholder = '',
        protected int $rows = 3,
    ) {}

    public function generate(): array
    {
        return [
            'uuid' => \Str::uuid(),
            'component' => self::COMPONENT,
            'props' => [
                'name' => $this->name,
                'label' => __($this->label),
                'placeholder' => __($this->placeholder),
                'rows' => $this->rows,
                'cssFieldClass' => self::CSS_FIELD_CLASS,
                'cssLabelClass' => self::CSS_LABEL_CLASS,
            ],
        ];
    }
}
