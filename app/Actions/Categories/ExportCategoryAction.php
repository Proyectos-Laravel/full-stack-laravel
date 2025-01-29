<?php

namespace App\Actions\Categories;

use App\Actions\Contracts\ExportAction;
use App\Exports\CategoriesExport;
use App\Services\ExcelExportService;
use App\ViewModels\Backoffice\Categories\GetCategoriesViewModel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

final class ExportCategoryAction implements ExportAction
{
    public static function execute(): BinaryFileResponse
    {
        $viewModel = app(GetCategoriesViewModel::class, ['paginated' => false]);

        return ExcelExportService::downloadExport(
            new CategoriesExport($viewModel->tableData()->collect()),
            'categories.xlsx'
        );
    }
}
