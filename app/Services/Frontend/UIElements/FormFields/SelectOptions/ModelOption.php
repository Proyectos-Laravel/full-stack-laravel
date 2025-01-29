<?php

namespace App\Services\Frontend\UIElements\FormFields\SelectOptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ModelOption implements Contracts\WithOptions
{
    public function __construct(
        private readonly Collection $collection,
        private readonly string $textField,
        private readonly string $valueField,
    ) {}

    public function getOptions(): array
    {
        return $this->collection->map(function (Model $item) {
            return [
                'text' => $item->{$this->textField},
                'value' => $item->{$this->valueField},
            ];
        })->toArray();
    }
}
