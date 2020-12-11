<?php

namespace App\Exports;

use App\PemerintahanDesa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

class PemerintahanDesaExport implements WithCustomValueBinder,FromView,ShouldAutoSize
{
    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        return true;
    }

    public function view(): View
    {
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan','asc')->get();
        return view('pemerintahan-desa.export', compact('pemerintahan_desa'));
    }
}
