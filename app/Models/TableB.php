<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableB extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'table_b';

    protected $primaryKey = 'kode_toko';

    protected $keyType = 'int';

    protected $fillable = [
        'kode_toko',
        'nominal_transaksi',
    ];

    protected $casts = [
        'nominal_transaksi' => 'decimal:2',
    ];

    public function tokoBaru()
    {
        return $this->belongsTo(TableA::class, 'kode_toko', 'kode_toko_baru');
    }

    public function tokoLama()
    {
        return $this->belongsTo(TableA::class, 'kode_toko', 'kode_toko_lama');
    }
}
