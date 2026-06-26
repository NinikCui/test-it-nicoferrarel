<?php

namespace App\Imports;

use App\Models\TableD;
use Exception;
use Rap2hpoutre\FastExcel\FastExcel;

class TableDImport
{
    public function import($file)
    {
        (new FastExcel)->import($file, function ($row) {
            if (! array_key_exists('kode_sales', $row)) {
                throw new Exception('Format Excel salah! Kolom "kode_sales" tidak ditemukan.');
            }
            if (! array_key_exists('nama_sales', $row)) {
                throw new Exception('Format Excel salah! Kolom "nama_sales" tidak ditemukan.');
            }

            if (empty(trim($row['kode_sales']))) {
                throw new Exception('kode_sales tidak boleh kosong.');
            }
            if (empty(trim($row['nama_sales']))) {
                throw new Exception('nama_sales tidak boleh kosong.');
            }

            TableD::create([
                'kode_sales' => trim($row['kode_sales']),
                'nama_sales' => trim($row['nama_sales']),
            ]);
        });
    }
}
