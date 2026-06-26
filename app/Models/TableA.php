<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableA extends Model
{
    public $timestamps = false;

    protected $table = 'table_a';

    protected $primaryKey = 'kode_toko_baru';

    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'kode_toko_baru',
        'kode_toko_lama',
    ];

    public function transaksiBaru()
    {
        return $this->hasMany(TableB::class, 'kode_toko', 'kode_toko_baru');
    }

    public function transaksiLama()
    {
        return $this->hasMany(TableB::class, 'kode_toko', 'kode_toko_lama');
    }

    public function area()
    {
        return $this->hasOne(TableC::class, 'kode_toko', 'kode_toko_baru');
    }
}
