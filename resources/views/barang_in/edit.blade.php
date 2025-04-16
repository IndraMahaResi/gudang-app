@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Barang Masuk</h2>
    <form action="{{ route('barang-in.update', $barangIn->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Barang</label>
            <select name="barang_id" class="form-control" required>
                @foreach($barangs as $barang)
                <option value="{{ $barang->id }}" {{ $barangIn->barang_id == $barang->id ? 'selected' : '' }}>
                    {{ $barang->nama_barang }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Qty</label>
            <input type="number" name="qty" class="form-control" value="{{ $barangIn->qty }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Supplier</label>
            <input type="text" name="supplier" class="form-control" value="{{ $barangIn->supplier }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" value="{{ $barangIn->tanggal_masuk }}" required>
        </div>

        <div class="form-group mb-3">
            <label>No Dokumen</label>
            <input type="text" name="no_dokumen" class="form-control" value="{{ $barangIn->no_dokumen }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('barang-in.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
