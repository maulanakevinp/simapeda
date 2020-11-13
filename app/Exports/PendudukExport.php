<?php

namespace App\Exports;

use App\Penduduk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

class PendudukExport implements WithCustomValueBinder,FromView,ShouldAutoSize,WithColumnFormatting
{
    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

        return true;
    }


    public function view(): View
    {
        $penduduk = Penduduk::latest()->get()->groupBy('kk');
        return view('penduduk.export', compact('penduduk'));
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_NUMBER,
            'I' => NumberFormat::FORMAT_NUMBER,
            'N' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
