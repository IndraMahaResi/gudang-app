<?php

namespace App\Http\Controllers;

use App\Models\BarangIn;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangInController extends Controller
{
    public function index()
    {
        $barangIns = BarangIn::with('barang')->get();
        return view('barang_in.index', compact('barangIns'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_in.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'qty' => 'required|integer',
            'supplier' => 'required',
            'tanggal_masuk' => 'required|date',
            'no_dokumen' => 'required|unique:barang_ins,no_dokumen',
        ]);

        BarangIn::create($request->all());

        return redirect()->route('barang-in.index')->with('success', 'Barang masuk berhasil dicatat!');
    }

    public function edit($id)
    {
        $barangIn = BarangIn::findOrFail($id);
        $barangs = Barang::all();
        return view('barang_in.edit', compact('barangIn', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $barangIn = BarangIn::findOrFail($id);

        $request->validate([
            'barang_id' => 'required',
            'qty' => 'required|integer',
            'supplier' => 'required',
            'tanggal_masuk' => 'required|date',
            'no_dokumen' => 'required|unique:barang_ins,no_dokumen,' . $barangIn->id,
        ]);

        $barangIn->update($request->all());

        return redirect()->route('barang-in.index')->with('success', 'Barang masuk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barangIn = BarangIn::findOrFail($id);
        $barangIn->delete();

        return redirect()->route('barang-in.index')->with('success', 'Barang masuk berhasil dihapus!');
    }
}
