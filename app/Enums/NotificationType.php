<?php

namespace App\Enums;

enum NotificationType: string
{
    case SUCCESS = 'success';
    case ERROR = 'error';
    case INFO = 'info';
    case WARNING = 'warning';
}
