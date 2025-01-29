<?php

namespace App\Services;

use App\Enums\NotificationType;
use Illuminate\Http\JsonResponse;

final class ToastNotificationService
{
    public function notify(NotificationType $type, string $title, string $message, int $timeout = 3000, array $extra = []): JsonResponse
    {
        return response()->json([
            'type' => $type->value,
            'title' => $title,
            'message' => $message,
            'timeout' => $timeout,
            'extra' => $extra,
        ]);
    }
}
