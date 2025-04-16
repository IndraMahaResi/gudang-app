@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 fw-bold">📦 Data Barang Keluar</h1>

    <a href="{{ route('barang-out.create') }}" class="btn btn-success mb-3 shadow-sm rounded-3">
        ➕ Tambah Barang Keluar
    </a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($barangOuts->isEmpty())
        <div class="alert alert-warning rounded-3 shadow-sm">⚠️ Tidak ada data barang keluar.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th>Barang</th>
                        <th>Qty</th>
                        <th>Tujuan</th>
                        <th>Tanggal Keluar</th>
                        <th>No Dokumen</th>
                        <th>Aksi</th> <!-- Tambahkan kolom untuk aksi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangOuts as $out)
                        <tr>
                            <td>{{ $out->barang->nama_barang ?? 'Data tidak tersedia' }}</td>
                            <td>{{ $out->qty }}</td>
                            <td>{{ $out->tujuan_pengiriman }}</td>
                            <td>{{ \Carbon\Carbon::parse($out->tanggal_keluar)->format('d M Y') }}</td>
                            <td>{{ $out->no_dokumen }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('barang-out.edit', $out->id) }}" class="btn btn-warning btn-sm shadow-sm">✏️ Edit</a>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('barang-out.destroy', $out->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">🗑️ Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
