<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Exception;

class TableBImport
{
    public function import($file)
    {
        (new FastExcel)->import($file, function ($row) {
            if (!array_key_exists('kode_toko', $row)) {
                throw new Exception('Format Excel salah! Kolom "kode_toko" tidak ditemukan.');
            }
            if (!array_key_exists('nominal_transaksi', $row)) {
                throw new Exception('Format Excel salah! Kolom "nominal_transaksi" tidak ditemukan.');
            }

            if (empty($row['kode_toko']) && $row['kode_toko'] !== 0) {
                throw new Exception('kode_toko tidak boleh kosong.');
            }
            if (empty($row['nominal_transaksi']) && $row['nominal_transaksi'] !== 0) {
                throw new Exception('nominal_transaksi tidak boleh kosong.');
            }

            DB::table('table_b')->insert([
                'kode_toko'         => (int) $row['kode_toko'],
                'nominal_transaksi' => (float) $row['nominal_transaksi'],
            ]);
        });
    }
}