<?php

namespace App\Exports;

use App\Exports\Contracts\Exportable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class LessonTypesExport implements FromView, Exportable
{
    public function __construct(protected Collection $collection) {}

    public function view(): View
    {
        return view('backoffice.exports.lesson_types', [
            'lessonTypes' => $this->collection,
        ]);
    }
}
