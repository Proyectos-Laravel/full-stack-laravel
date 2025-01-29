<?php

namespace App\Services\Frontend;

use App\Services\Frontend\UIElements\ColumnItems\Contracts\ColumnItem;

final class TableGenerator
{
    private array $sorter = [];

    private array $columns = [];

    public function initSorter(array $sorter): void
    {
        $this->sorter = $sorter;
    }

    public function getSortDirection(string $column): string
    {
        return $this->sorter['column'] === $column ? $this->sorter['direction'] : 'asc';
    }

    public function addColumn(ColumnItem $column): self
    {
        $this->columns[] = $column->generate();

        return $this;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }
}
