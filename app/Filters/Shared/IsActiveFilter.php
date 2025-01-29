<?php

namespace App\Filters\Shared;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class IsActiveFilter extends Filter
{
    public function handle(Builder $items, \Closure $next): Builder
    {
        if (! strlen($this->filter->getValue())) {
            return $next($items);
        }

        $items
            ->where('is_active', '=', (bool) $this->filter->getValue());

        return $next($items);
    }
}
