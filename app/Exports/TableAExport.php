<?php

namespace App\Exports;

use App\Models\TableA;
use Rap2hpoutre\FastExcel\FastExcel;

class TableAExport
{
    public function download()
    {
        $data = TableA::all(['kode_toko_baru', 'kode_toko_lama']);

        return (new FastExcel($data))->download('table_a.xlsx');
    }
}
