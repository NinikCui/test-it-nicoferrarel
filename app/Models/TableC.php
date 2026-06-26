<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableC extends Model
{
    public $timestamps = false;

    protected $table = 'table_c';

    protected $primaryKey = 'kode_toko';

    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'kode_toko',
        'area_sales',
    ];

    public function toko()
    {
        return $this->belongsTo(TableA::class, 'kode_toko', 'kode_toko_baru');
    }

    public function salesTerakhir()
    {
        return $this->hasOne(TableD::class, 'kode_sales', 'area_sales');
    }
}
