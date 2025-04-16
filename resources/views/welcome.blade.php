@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">📦 Warehouse Management System</h1>
        <p class="text-muted">Kelola stok barang masuk dan keluar secara efisien dan terintegrasi.</p>
    </div>

    <div class="row g-4">
        <!-- Barang -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('barang.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-0 rounded-4 bg-light hover-shadow">
                    <div class="card-body text-center">
                        <div class="fs-1 text-primary mb-3">
                            📋
                        </div>
                        <h5 class="card-title fw-semibold">Barang</h5>
                        <p class="card-text text-muted small">Daftar barang yang tersedia di gudang.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Barang Masuk -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('barang-in.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-0 rounded-4 bg-light">
                    <div class="card-body text-center">
                        <div class="fs-1 text-success mb-3">
                            📥
                        </div>
                        <h5 class="card-title fw-semibold">Barang Masuk</h5>
                        <p class="card-text text-muted small">Lihat dan catat barang yang masuk.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Barang Keluar -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('barang-out.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-0 rounded-4 bg-light">
                    <div class="card-body text-center">
                        <div class="fs-1 text-danger mb-3">
                            📤
                        </div>
                        <h5 class="card-title fw-semibold">Barang Keluar</h5>
                        <p class="card-text text-muted small">Kelola pengiriman dan barang keluar.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Stock -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('stock.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-0 rounded-4 bg-light">
                    <div class="card-body text-center">
                        <div class="fs-1 text-warning mb-3">
                            📊
                        </div>
                        <h5 class="card-title fw-semibold">Stok Barang</h5>
                        <p class="card-text text-muted small">Pantau akumulasi barang masuk & keluar.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
