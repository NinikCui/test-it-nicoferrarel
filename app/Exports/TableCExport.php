<?php

namespace App\Exports;

use App\Models\TableC;
use Rap2hpoutre\FastExcel\FastExcel;

class TableCExport
{
    public function download()
    {
        $data = TableC::all(['kode_toko', 'area_sales']);

        return (new FastExcel($data))->download('table_c.xlsx');
    }
}
