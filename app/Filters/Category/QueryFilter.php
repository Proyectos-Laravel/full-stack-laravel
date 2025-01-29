<?php

namespace App\Filters\Category;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class QueryFilter extends Filter
{
    public function handle(Builder $items, \Closure $next): Builder
    {
        if (! strlen($this->filter->getValue())) {
            return $next($items);
        }

        $items
            ->where(function (Builder $query) {
                $query
                    ->where('name', 'like', '%' . $this->filter->getValue() . '%')
                    ->orWhere('description', 'like', '%' . $this->filter->getValue() . '%');
            });

        return $next($items);
    }
}
