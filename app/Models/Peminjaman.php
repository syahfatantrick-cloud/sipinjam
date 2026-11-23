<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $fillable = ['alat_id', 'nama_peminjam', 'tanggal_pinjam', 'jumlah', 'status'];

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
}