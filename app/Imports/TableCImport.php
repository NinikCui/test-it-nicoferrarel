<?php

namespace App\Imports;

use App\Models\TableC;
use Exception;
use Rap2hpoutre\FastExcel\FastExcel;

class TableCImport
{
    public function import($file)
    {
        (new FastExcel)->import($file, function ($row) {
            if (! array_key_exists('kode_toko', $row)) {
                throw new Exception('Format Excel salah! Kolom "kode_toko" tidak ditemukan.');
            }
            if (! array_key_exists('area_sales', $row)) {
                throw new Exception('Format Excel salah! Kolom "area_sales" tidak ditemukan.');
            }

            if (empty($row['kode_toko']) && $row['kode_toko'] !== 0) {
                throw new Exception('kode_toko tidak boleh kosong.');
            }
            if (empty(trim($row['area_sales']))) {
                throw new Exception('area_sales tidak boleh kosong.');
            }

            TableC::create([
                'kode_toko' => (int) $row['kode_toko'],
                'area_sales' => trim($row['area_sales']),
            ]);
        });
    }
}
