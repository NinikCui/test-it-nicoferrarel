<?php

namespace App\Imports;

use App\Models\TableA;
use Exception;
use Rap2hpoutre\FastExcel\FastExcel;

class TableAImport
{
    public function import($file)
    {
        (new FastExcel)->import($file, function ($row) {
            if (! array_key_exists('kode_toko_baru', $row)) {
                throw new Exception('Format Excel salah! Kolom "kode_toko_baru" tidak ditemukan.');
            }

            if (empty($row['kode_toko_baru']) && $row['kode_toko_baru'] !== 0) {
                throw new Exception('kode_toko_baru tidak boleh kosong.');
            }

            TableA::create([
                'kode_toko_baru' => (int) $row['kode_toko_baru'],
                'kode_toko_lama' => ! empty($row['kode_toko_lama']) ? (int) $row['kode_toko_lama'] : null,
            ]);
        });
    }
}
