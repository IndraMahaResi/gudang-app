@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4 fw-bold">🚚 Input Barang Keluar</h1>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('barang-out.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">📦 Barang</label>
                    <select name="barang_id" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">🔢 Qty</label>
                    <input type="number" name="qty" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">📍 Tujuan Pengiriman</label>
                    <input type="text" name="tujuan_pengiriman" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">📅 Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">🧾 No Dokumen</label>
                    <input type="text" name="no_dokumen" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    💾 Simpan
                </button>
                <a href="{{ route('barang-out.index') }}" class="btn btn-secondary ms-2">
                    ↩️ Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
