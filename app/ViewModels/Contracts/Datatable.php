<?php

namespace App\ViewModels\Contracts;

use App\Overrides\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface Datatable
{
    public function title(): string;

    public function textModel(): string;

    public function tableColumns(): array;

    public function tableData(): ResourceCollection|LengthAwarePaginator;

    public function tableButtons(): array;

    public function modals(): array;

    public function filterFields(): array;
}
