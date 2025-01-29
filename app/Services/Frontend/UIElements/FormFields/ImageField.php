<?php

namespace App\Services\Frontend\UIElements\FormFields;

class ImageField implements Contracts\Field
{
    const COMPONENT = 'AppImageField';

    const CSS_LABEL_CLASS = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';

    const CSS_FIELD_CLASS = 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400';

    const CSS_HELP_CLASS = 'mt-1 text-sm text-gray-500 dark:text-gray-300';

    public function __construct(
        protected string $name,
        protected string $label,
        protected string $accept = '',
        protected string $help = '',
    ) {}

    public function generate(): array
    {
        return [
            'uuid' => \Str::uuid(),
            'component' => self::COMPONENT,
            'props' => [
                'name' => $this->name,
                'label' => __($this->label),
                'help' => __($this->help),
                'accept' => $this->accept,
                'cssFieldClass' => self::CSS_FIELD_CLASS,
                'cssLabelClass' => self::CSS_LABEL_CLASS,
                'cssHelpClass' => self::CSS_HELP_CLASS,
            ],
        ];
    }
}
