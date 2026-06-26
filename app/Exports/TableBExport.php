<?php

namespace App\Exports;

use App\Models\TableB;
use Rap2hpoutre\FastExcel\FastExcel;

class TableBExport
{
    public function download()
    {
        $data = TableB::all(['kode_toko', 'nominal_transaksi']);

        return (new FastExcel($data))->download('table_b.xlsx');
    }
}
