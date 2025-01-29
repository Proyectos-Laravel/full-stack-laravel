<?php

namespace App\Actions\Contracts;

interface UpdateAction extends Action
{
    public static function execute(int $id, array $data = []): void;
}
