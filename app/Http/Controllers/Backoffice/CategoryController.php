<?php

namespace App\Http\Controllers\Backoffice;

use App\Actions\Categories\CreateCategoryAction;
use App\Actions\Categories\DeleteCategoryAction;
use App\Actions\Categories\ExportCategoryAction;
use App\Actions\Categories\UpdateCategoryAction;
use App\Enums\NotificationType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\ExcelExportService;
use App\Services\ToastNotificationService;
use App\ViewModels\Backoffice\Categories\GetCategoriesViewModel;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CategoryController extends Controller
{
    public function __construct(private readonly ToastNotificationService $toastNotification)
    {
    }

    public function index(): View
    {
        return view('backoffice.categories.index', [
            'json_url' => route('backoffice.categories.json'),
        ]);
    }

    public function json(GetCategoriesViewModel $viewModel): JsonResponse
    {
        return response()->json($viewModel->toArray());
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $category = CreateCategoryAction::execute($request->validated());

        return $this->toastNotification->notify(
            type: NotificationType::SUCCESS,
            title: __('Categoría creada'),
            message: __('La categoría :name ha sido creada', ['name' => $category->name]),
            timeout: 5000,
        );
    }

    public function update(CategoryRequest $request, int $id): JsonResponse
    {
        UpdateCategoryAction::execute($id, $request->validated());

        return $this->toastNotification->notify(
            type: NotificationType::SUCCESS,
            title: __('Categoría actualizada'),
            message: __('La categoría ha sido actualizada con éxito'),
            timeout: 5000,
        );
    }

    public function destroy(int $id): JsonResponse
    {
        DeleteCategoryAction::execute($id);

        return $this->toastNotification->notify(
            type: NotificationType::SUCCESS,
            title: __('Categoría eliminada'),
            message: __('La categoría ha sido eliminada con éxito'),
            timeout: 5000,
        );
    }

    /**
     * @throws Exception
     */
    public function generateExportUrl(): JsonResponse
    {
        $url = ExcelExportService::generateExportUrl('backoffice.categories.export');

        return $this->toastNotification->notify(
            type: NotificationType::SUCCESS,
            title: __('Exportación iniciada'),
            message: __('La exporación iniciará en breve'),
            extra: [
                'url' => $url,
            ]
        );
    }

    public function export(): BinaryFileResponse
    {
        return ExportCategoryAction::execute();
    }
}
