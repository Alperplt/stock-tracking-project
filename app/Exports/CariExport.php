<?php

namespace App\Exports;
use App\Models\Cari;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CariExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.cari.cariexcels', [
            'cariexcels' => Cari::all()
        ]);
    }
}