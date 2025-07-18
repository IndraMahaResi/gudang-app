<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'qty'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
