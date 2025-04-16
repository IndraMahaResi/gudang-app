@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">📥 Daftar Barang Masuk</h1>
        <a href="{{ route('barang-in.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah Barang Masuk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($barangIns->isEmpty())
        <div class="alert alert-warning text-center">Belum ada data barang masuk.</div>
    @else
        <div class="card shadow-sm rounded-4">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Supplier</th>
                            <th>Tanggal Masuk</th>
                            <th>No Dokumen</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangIns as $in)
                            <tr>
                                <td>{{ $in->id }}</td>
                                <td>{{ $in->barang->nama_barang ?? 'Tidak tersedia' }}</td>
                                <td>{{ $in->qty }}</td>
                                <td>{{ $in->supplier }}</td>
                                <td>{{ \Carbon\Carbon::parse($in->tanggal_masuk)->format('d M Y') }}</td>
                                <td>{{ $in->no_dokumen }}</td>
                                <td class="text-center">
                                    <a href="{{ route('barang-in.edit', $in->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                    
                                    <form action="{{ route('barang-in.destroy', $in->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
