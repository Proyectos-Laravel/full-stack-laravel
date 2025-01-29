<?php

namespace App\Services\Frontend;

use App\Services\Frontend\UIElements\FormFields\Contracts\Field;

final class FormFieldsGenerator
{
    protected array $fields = [];

    public function addField(Field $field): self
    {
        $this->fields[] = $field->generate();

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}
