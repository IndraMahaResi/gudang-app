@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-success text-white fw-bold">
            📝 Form Tambah Barang
        </div>
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Contoh: Laptop, Meja, etc." required>
                </div>

                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" name="satuan" class="form-control" placeholder="Contoh: Unit, Pcs, Box" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('barang.index') }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-success">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
