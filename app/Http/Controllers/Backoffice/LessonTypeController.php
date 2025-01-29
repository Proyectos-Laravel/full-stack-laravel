<?php

namespace App\Http\Controllers\Backoffice;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\Actions\LessonTypes\CreateLessonTypeAction;
use App\Actions\LessonTypes\DeleteLessonTypeAction;
use App\Actions\LessonTypes\ExportLessonTypeAction;
use App\Actions\LessonTypes\UpdateLessonTypeAction;
use App\Enums\NotificationType;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonTypeRequest;
use App\Services\ExcelExportService;
use App\Services\ToastNotificationService;
use App\ViewModels\Backoffice\LessonTypes\GetLessonTypesViewModel;

final class LessonTypeController extends Controller
{
    public function __construct(private readonly ToastNotificationService $toastNotification)
    {
    }

    public function index(): View
    {
        view()->share('title', __('Tipos de lección'));

        return view('backoffice.lesson_types.index', [
            'json_url' => route('backoffice.lesson_types.json'),
        ]);
    }

    public function json(GetLessonTypesViewModel $viewModel): JsonResponse
    {
        return response()->json($viewModel->toArray());
    }

    public function store(LessonTypeRequest $request): JsonResponse
    {
        $lessonType = CreateLessonTypeAction::execute($request->validated());

        return $this->toastNotification->notify(
            type: NotificationType::SUCCESS,
            title: __('Tipo de lección creada'),
            message: __('El tipo de lección :name ha sido creada', ['name' => $lessonType->name]),
            timeout: 5000,
        );
    }

    public function update(LessonTypeRequest $request, int $id): JsonResponse
    {
        UpdateLessonTypeAction::execute($id, $request->validated());

        return $this->toastNotification->notify(
            type: NotificationType::SUCCESS,
            title: __('Tipo de lección actualizada'),
            message: __('El tipo de lección ha sido actualizada'),
            timeout: 5000,
        );
    }

    public function destroy(int $id): JsonResponse
    {
        DeleteLessonTypeAction::execute($id);

        return $this->toastNotification->notify(
            type: NotificationType::SUCCESS,
            title: __('Tipo de lección eliminada'),
            message: __('El tipo de lección ha sido eliminada'),
            timeout: 5000,
        );
    }

    /**
     * @throws Exception
     */
    public function generateExportUrl(): JsonResponse
    {
        $url = ExcelExportService::generateExportUrl('backoffice.lesson_types.export');

        return $this->toastNotification->notify(
            type: NotificationType::SUCCESS,
            title: __('Exportación iniciada'),
            message: __('La exportación iniciará en breve'),
            extra: [
                'url' => $url,
            ],
        );
    }

    public function export(): BinaryFileResponse
    {
        return ExportLessonTypeAction::execute();
    }
}
