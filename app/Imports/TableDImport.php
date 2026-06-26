<?php

namespace App\Imports;

use App\Models\TableD;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TableDImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new TableD([
            'kode_sales' => $row['kode_sales'],
            'nama_sales' => $row['nama_sales'],
        ]);
    }

    public function rules(): array
    {
        return [
            'kode_sales' => 'required|string|unique:table_d,kode_sales',
            'nama_sales' => 'required|string|max:20',
        ];
    }
}
