<?php

Route::jsonGroup('dashboard', \App\Http\Controllers\Backoffice\DashboardController::class, [
    'index', 'json',
]);

Route::jsonGroup('categories', \App\Http\Controllers\Backoffice\CategoryController::class, [
    'index', 'json', 'store', 'update', 'destroy', 'export',
]);

Route::jsonGroup('lesson_types', \App\Http\Controllers\Backoffice\LessonTypeController::class, [
    'index', 'json', 'store', 'update', 'destroy', 'export',
]);
