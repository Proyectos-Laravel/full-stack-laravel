<?php

namespace App\Services\ViewModels;

final class FilterService
{
    public function generateSorterFilter(string $key, array $default = ['column' => 'created_at', 'direction' => 'desc']): array
    {
        return [
            $key => request($key, $default),
        ];
    }

    public function generateNormalFilter(string $key, string $default = ''): array
    {
        return [
            $key => request($key, $default),
        ];
    }

    public function generateRangeFilter(string $key, string $prefix = '', string $defaultFrom = '', string $defaultTo = ''): array
    {
        return [
            $key => [
                'from' => request($prefix . '_from', $defaultFrom),
                'to' => request($prefix . '_to', $defaultTo),
            ]
        ];
    }
}
