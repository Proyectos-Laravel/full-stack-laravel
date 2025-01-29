<?php

namespace App\Services\Frontend\UIElements\ColumnItems;

abstract class TrueFalseColumn extends Column
{
    public function generate(): array
    {
        $column = parent::generate();

        $column['true_value'] = $this->trueValue ?? __('Sí');
        $column['false_value'] = $this->falseValue ?? __('No');

        return $column;
    }
}
