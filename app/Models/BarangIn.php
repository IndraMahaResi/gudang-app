<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangIn extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'qty', 'supplier', 'tanggal_masuk', 'no_dokumen'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
