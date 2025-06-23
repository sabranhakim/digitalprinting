<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Dashboard Admin</h2>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Summary Cards --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Produk</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalProduk ?? '-' }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Order</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalOrder ?? '-' }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Belum Dibayar</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $orderBelumDibayar ?? '-' }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Ulasan Masuk</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalUlasan ?? '-' }}</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Navigasi Cepat --}}
        <div class="card">
            <div class="card-header">Navigasi Cepat</div>
            <div class="card-body">
                <a href="{{ route('produk.index') }}" class="btn btn-outline-primary m-1">Kelola Produk</a>
                <a href="{{ route('order.index') }}" class="btn btn-outline-success m-1">Kelola Order</a>
                <a href="{{ route('pembayaran.verifikasi') }}" class="btn btn-outline-warning m-1">Verifikasi Pembayaran</a>
                <a href="{{ route('ulasan.index') }}" class="btn btn-outline-danger m-1">Lihat Ulasan</a>
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-secondary m-1">Logout</a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</body>
</html>
