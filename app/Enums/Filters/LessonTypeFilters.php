<?php

namespace App\Enums\Filters;

use App\Filters\Filter;
use App\Filters\FilterValue;
use App\Filters\Shared\IsActiveFilter;
use App\Filters\LessonType\QueryFilter;
use App\Filters\LessonType\SorterFilter;

enum LessonTypeFilters: string
{
    case Sorter = 'sorter';

    case Query = 'query';

    case IsActive = 'is_active';

    public function create(FilterValue $filter): Filter
    {
        return match ($this) {
            self::Sorter => new SorterFilter(filter: $filter),
            self::Query => new QueryFilter(filter: $filter),
            self::IsActive => new IsActiveFilter(filter: $filter),
        };
    }
}
