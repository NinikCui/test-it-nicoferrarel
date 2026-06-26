<?php

namespace App\Exports;

use App\Models\TableD;
use Rap2hpoutre\FastExcel\FastExcel;

class TableDExport
{
    public function download()
    {
        $data = TableD::all(['kode_sales', 'nama_sales']);

        return (new FastExcel($data))->download('table_d.xlsx');
    }
}
