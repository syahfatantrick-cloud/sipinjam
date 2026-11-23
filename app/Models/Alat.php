<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alats';

    protected $fillable = ['kode', 'nama', 'stok', 'lokasi', 'kondisi'];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'alat_id');
    }
}