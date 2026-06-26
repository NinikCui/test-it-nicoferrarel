<?php

namespace App\Exports;

use App\Models\TableD;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TableDExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return TableD::all(['kode_sales', 'nama_sales']);
    }

    public function headings(): array
    {
        return ['kode_sales', 'nama_sales'];
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
