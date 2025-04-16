@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-success mb-4 fw-bold">Data Stok Barang</h1>

    <!-- Tampil jika data stok kosong -->
    @if($stocks->isEmpty())
        <div class="alert alert-warning text-center shadow-sm rounded-3">
            <strong>⚠️ Tidak ada data stok barang.</strong>
        </div>
    @else
        <!-- Table dengan styling -->
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Total Masuk</th>
                        <th>Total Keluar</th>
                        <th>Stok Tersisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                        <tr class="text-center hover-effect">
                            <td>{{ $stock->nama_barang }}</td>
                            <td>{{ $stock->satuan }}</td>
                            <td>{{ $stock->total_in }}</td>
                            <td>{{ $stock->total_out }}</td>
                            <td>{{ $stock->sisa }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Custom CSS -->
<style>
    /* Styling untuk tabel */
    .table {
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .table-dark th {
        background-color: #343a40;
        color: white;
    }

    .table-hover tbody tr:hover {
        background-color: #e2e6ea;
    }

    /* Penambahan efek hover pada baris tabel */
    .hover-effect:hover {
        background-color: #f1f1f1;
        transition: background-color 0.3s;
    }

    .alert {
        font-size: 16px;
        font-weight: bold;
        padding: 20px;
    }

    .alert-warning {
        background-color: #fff3cd;
        border-left: 4px solid #ffc107;
    }

    /* Styling untuk judul */
    h1 {
        font-size: 2.5rem;
        letter-spacing: 1px;
        color: #28a745;
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .table {
            font-size: 14px;
        }

        h1 {
            font-size: 2rem;
        }
    }
</style>
@endsection
