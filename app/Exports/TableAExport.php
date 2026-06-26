<?php

namespace App\Exports;

use App\Models\TableA;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TableAExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return TableA::all(['kode_toko_baru', 'kode_toko_lama']);
    }

    public function headings(): array
    {
        return ['kode_toko_baru', 'kode_toko_lama'];
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
