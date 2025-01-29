<?php

namespace App\Actions\LessonTypes;

use App\Actions\Contracts\ExportAction;
use App\Exports\LessonTypesExport;
use App\Services\ExcelExportService;
use App\ViewModels\Backoffice\LessonTypes\GetLessonTypesViewModel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

final class ExportLessonTypeAction implements ExportAction
{
    public static function execute(): BinaryFileResponse
    {
        $viewModel = app(GetLessonTypesViewModel::class, ['paginated' => false]);

        return ExcelExportService::downloadExport(
            new LessonTypesExport($viewModel->tableData()->collect()),
            'lesson-types.xlsx'
        );
    }
}
