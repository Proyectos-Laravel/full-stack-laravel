<?php

namespace App\Actions\Contracts;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface ExportAction extends Action
{
    public static function execute(): BinaryFileResponse;
}
