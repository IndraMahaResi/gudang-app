@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Edit Barang Keluar</h2>
    <form action="{{ route('barang-out.update', $barangOut->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Barang</label>
            <select name="barang_id" class="form-control" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $barangOut->barang_id == $barang->id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Qty</label>
            <input type="number" name="qty" class="form-control" value="{{ $barangOut->qty }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Tujuan Pengiriman</label>
            <input type="text" name="tujuan_pengiriman" class="form-control" value="{{ $barangOut->tujuan_pengiriman }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="form-control" value="{{ $barangOut->tanggal_keluar }}" required>
        </div>

        <div class="form-group mb-3">
            <label>No Dokumen</label>
            <input type="text" name="no_dokumen" class="form-control" value="{{ $barangOut->no_dokumen }}" required>
        </div>

        <button type="submit" class="btn btn-primary">💾 Update</button>
        <a href="{{ route('barang-out.index') }}" class="btn btn-secondary">↩️ Kembali</a>
    </form>
</div>
@endsection
