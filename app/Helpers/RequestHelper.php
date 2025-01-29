<?php

namespace App\Helpers;

final class RequestHelper
{
    public static function queryWithoutNulls(): string
    {
        return http_build_query(array_filter(request()->all(), fn($value) => $value !== null && $value !== 'null'));
    }
}
