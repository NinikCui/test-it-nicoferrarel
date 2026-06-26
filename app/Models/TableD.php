<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableD extends Model
{
    public $timestamps = false;

    protected $table = 'table_d';

    protected $primaryKey = 'kode_sales';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode_sales',
        'nama_sales',
    ];

    public function scopeTerakhirDiArea($query, string $area)
    {
        return $query
            ->where('kode_sales', 'like', $area.'%')
            ->orderByDesc('kode_sales')
            ->limit(1);
    }

    public function getAreaAttribute(): string
    {
        return substr($this->kode_sales, 0, 1);
    }
}
