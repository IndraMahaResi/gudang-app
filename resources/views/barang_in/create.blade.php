@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 fw-bold">➕ Tambah Barang Masuk</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada beberapa masalah dengan input kamu.<br><br>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <form action="{{ route('barang-in.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="barang_id" class="form-label">Nama Barang</label>
                    <select name="barang_id" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" name="qty" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="supplier" class="form-label">Supplier</label>
                    <input type="text" name="supplier" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_dokumen" class="form-label">No Dokumen</label>
                    <input type="text" name="no_dokumen" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('barang-in.index') }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-primary">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
