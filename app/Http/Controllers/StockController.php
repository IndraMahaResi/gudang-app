<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Barang;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        $stocks = $barangs->map(function ($barang) {
            $totalIn = $barang->barangIns()->sum('qty');
            $totalOut = $barang->barangOuts()->sum('qty');

            return (object)[
                'nama_barang' => $barang->nama_barang,
                'satuan' => $barang->satuan,
                'total_in' => $totalIn,
                'total_out' => $totalOut,
                'sisa' => $totalIn - $totalOut
            ];
        });

        return view('stock.index', compact('stocks'));
    }
}
