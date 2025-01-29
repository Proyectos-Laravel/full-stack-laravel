<?php

namespace App\Exports;

use App\Exports\Contracts\Exportable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;

readonly class CategoriesExport implements Exportable, FromView
{
    public function __construct(protected readonly Collection $collection) {}

    public function view(): View
    {
        return view('backoffice.exports.categories', [
            'categories' => $this->collection,
        ]);
    }
}
