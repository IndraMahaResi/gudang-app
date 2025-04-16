@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">📦 Daftar Barang</h1>
        <a href="{{ route('barang.create') }}" class="btn btn-success shadow-sm">+ Tambah Barang</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($barangs->isEmpty())
        <div class="alert alert-warning">⚠️ Tidak ada data barang.</div>
    @else
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Tanggal Input</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangs as $barang)
                            <tr>
                                <td>{{ $barang->id }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->satuan }}</td>
                                <td>{{ \Carbon\Carbon::parse($barang->created_at)->format('d-m-Y H:i') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>

                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
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
