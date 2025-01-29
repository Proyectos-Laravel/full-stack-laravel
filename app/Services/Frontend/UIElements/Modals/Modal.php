<?php

namespace App\Services\Frontend\UIElements\Modals;

use Illuminate\Support\Str;

class Modal implements Contracts\Modal
{
    public function __construct(
        protected readonly string $type,
        protected readonly string $title,
        protected readonly ?string $textSubmitButton = null,
        protected readonly ?array $action = null,
        protected readonly ?string $questionMessage = null,
        protected readonly ?string $textCancelButton = null,
        protected readonly ?array $formFields = null,
        protected readonly ?array $extraData = null,
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function generate(): array
    {
        return array_filter([
            'id' => Str::uuid(),
            'type' => $this->type,
            'title' => $this->title,
            'action' => $this->action,
            'text_submit_button' => $this->textSubmitButton,
            'question_message' => $this->questionMessage,
            'text_cancel_button' => $this->textCancelButton,
            'form_fields' => $this->formFields,
            'extra_data' => $this->extraData,
        ], fn ($value) => $value !== null);
    }
}
