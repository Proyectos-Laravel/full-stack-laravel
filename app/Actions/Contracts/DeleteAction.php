<?php

namespace App\Actions\Contracts;

interface DeleteAction extends Action
{
    public static function execute(int $id): void;
}
