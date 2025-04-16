<?php

namespace App\Http\Controllers;

use App\Models\BarangOut;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangOutController extends Controller
{
    public function index()
    {
        $barangOuts = BarangOut::with('barang')->get();
        return view('barang_out.index', compact('barangOuts'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_out.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'qty' => 'required|integer',
            'tujuan_pengiriman' => 'required',
            'tanggal_keluar' => 'required|date',
            'no_dokumen' => 'required|unique:barang_outs,no_dokumen',
        ]);

        BarangOut::create($request->all());

        return redirect()->route('barang-out.index')->with('success', 'Barang keluar berhasil dicatat!');
    }

    public function edit($id)
    {
        $barangOut = BarangOut::findOrFail($id);
        $barangs = Barang::all();
        return view('barang_out.edit', compact('barangOut', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $barangOut = BarangOut::findOrFail($id);

        $request->validate([
            'barang_id' => 'required',
            'qty' => 'required|integer',
            'tujuan_pengiriman' => 'required',
            'tanggal_keluar' => 'required|date',
            'no_dokumen' => 'required|unique:barang_outs,no_dokumen,' . $barangOut->id,
        ]);

        $barangOut->update($request->all());

        return redirect()->route('barang-out.index')->with('success', 'Barang keluar berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barangOut = BarangOut::findOrFail($id);
        $barangOut->delete();

        return redirect()->route('barang-out.index')->with('success', 'Barang keluar berhasil dihapus!');
    }
}
