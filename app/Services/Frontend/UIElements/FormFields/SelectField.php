<?php

namespace App\Services\Frontend\UIElements\FormFields;

class SelectField implements Contracts\Field
{
    const COMPONENT = 'AppSelectField';

    const CSS_LABEL_CLASS = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';

    const CSS_FIELD_CLASS = 'bg-gray-50 p-1.6 mt-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';

    public function __construct(
        protected string $name,
        protected string $label,
        protected string $placeholder = '',
        protected array $options = [],
        protected bool $disabled = false,
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
                'disabled' => $this->disabled,
                'options' => $this->options,
                'cssLabelClass' => self::CSS_LABEL_CLASS,
                'cssFieldClass' => self::CSS_FIELD_CLASS,
            ],
        ];
    }
}
