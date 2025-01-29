<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class BaseSorterFilter extends Filter
{
    const AVAILABLE_DIRECTION_SORTERS = ['asc', 'desc'];

    public array $availableColumnSorters = [];

    public string $primaryKey;

    public ?string $defaultSorterColumn = null;

    public function handle(Builder $items, \Closure $next): Builder
    {
        $filter = $this->filter->getValue();
        $column = data_get($filter, 'column');
        $direction = data_get($filter, 'direction');

        if (! $column || ! $direction || ! is_string($column) || ! is_string($direction)) {
            $this->applyDefaultSort($items);
            return $next($items);
        }

        if (
            ! in_array(needle: $column, haystack: $this->availableColumnSorters) ||
            ! in_array(needle: $direction, haystack: self::AVAILABLE_DIRECTION_SORTERS)
        ) {
            $this->applyDefaultSort($items);
            return $next($items);
        }

        $items->orderBy(column: $column, direction: $direction);

        return $next($items);
    }

    private function applyDefaultSort(Builder $items): void
    {
        if ($this->defaultSorterColumn) {
            $items->orderByDesc(column: $this->defaultSorterColumn);
        } else {
            $items->latest($this->primaryKey);
        }
    }
}
