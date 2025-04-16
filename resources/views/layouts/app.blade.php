<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Application</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts + Custom CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .navbar {
            border-radius: 12px;
            margin-bottom: 20px;
            padding: 15px 30px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #28a745 !important;
        }

        .nav-link {
            font-weight: 500;
            transition: all 0.3s;
        }

        .nav-link:hover {
            color: #28a745 !important;
            transform: translateY(-2px);
        }

        .container {
            padding-bottom: 40px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}">Warehouse System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barang.index') }}">Daftar Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barang-in.index') }}">Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barang-out.index') }}">Barang Keluar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stock.index') }}">Stock</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        @yield('content')

        <!-- Footer -->
        <footer>
            &copy; {{ date('Y') }} Warehouse System by Kelompok 4.
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
