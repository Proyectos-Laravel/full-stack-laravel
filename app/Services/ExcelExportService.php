<?php

namespace App\Services;

use App\Exports\Contracts\Exportable;
use App\Helpers\RequestHelper;
use Exception;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExcelExportService
{
    /**
     * @throws Exception
     */
    public static function generateExportUrl(string $routeName): string
    {
        if (! Route::has($routeName)) {
            throw new \Exception("La ruta {$routeName} no existe");
        }

        return route($routeName, RequestHelper::queryWithoutNulls());
    }

    public static function downloadExport(Exportable $exportable, string $fileName): BinaryFileResponse
    {
        return Excel::download($exportable, $fileName);
    }
}
