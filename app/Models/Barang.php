<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'satuan'];

    public function barangIns()
    {
        return $this->hasMany(BarangIn::class);
    }

    public function barangOuts()
    {
        return $this->hasMany(BarangOut::class);
    }
}
