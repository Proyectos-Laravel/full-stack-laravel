<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\ViewModels\Backoffice\GetDashboardViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('backoffice.dashboard', [
            'json_url' => route('backoffice.dashboard.json'),
        ]);
    }

    public function json(GetDashboardViewModel $viewModel): JsonResponse
    {
        return response()->json($viewModel->toArray());
    }
}
