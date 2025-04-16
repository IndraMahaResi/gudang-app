<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangOut extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'qty', 'tujuan_pengiriman', 'tanggal_keluar', 'no_dokumen'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
