<?php

namespace App\Exports;

use App\Models\TableB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TableBExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return TableB::all(['kode_toko', 'nominal_transaksi']);
    }

    public function headings(): array
    {
        return ['kode_toko', 'nominal_transaksi'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FF4F81BD']],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }
}
