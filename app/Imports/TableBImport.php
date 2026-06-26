<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TableBImport implements ToCollection, WithHeadingRow, WithValidation
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            DB::table('table_b')->insert([
                'kode_toko' => $row['kode_toko'],
                'nominal_transaksi' => $row['nominal_transaksi'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'kode_toko' => 'required|integer',
            'nominal_transaksi' => 'required|numeric|min:0',
        ];
    }
}
