<?php

namespace App\Exports;

use App\PemerintahanDesa;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemerintahanDesaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PemerintahanDesa::all();
    }
}
