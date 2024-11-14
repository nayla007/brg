<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Barang</title>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Kontainer utama untuk seluruh halaman dengan margin atas (mt-3) -->
    <div class="container mt-3">
                <!-- judul berada di tengah dengan margin bawah 4(mb-4) -->
        <h1 class="text-center mb-4">Detail Barang</h1>

        <!-- menampilkan pesan error jika ada -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <!-- jika ada session dengan key 'error', akan menampilkan alert dengan pesan error -->
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header mb-2">
                        <!-- ID barang diambil dari objek $barang -->
                            <span class="label">Id Barang:</span>
                            <span class="value">{{ $barang->idbarang}}</span>
                        </div>
                        <div class="card-header mb-2">
                            <span class="label">Nama Barang:</span>
                            <span class="value">{{ $barang->nama_barang}}</span>
                        </div>

                        <!-- Harga barang diambil dari objek $barang, diformat ke dalam format mata uang -->
                        <div class="card-header mb-2">
                            <span class="label">Harga:</span>
                            <span class="value">Rp {{number_format($barang->harga, 0, ',', '.')}}</span>
                        </div>
                        <div class="card-header mb-3">
                            <span class="label">Stok:</span>
                            <span class="value">{{ $barang->stok}}</span>
                        </div>
                        @if($barang->foto)
                            <div class="card-header mb-2">
                                <span class="label">Foto:</span>
                                <div>
                                    <img src="{{ asset('storage/'. $barang->foto)}}" alt="Foto Barang" class="img-fluid" style="max-width: 300px;">
                                </div>
                        @else
                            <div class="mb-3">
                                <span class="label">Foto:</span>
                                <span class="value">No foto</span>
                            </div>
                        @endif

                        <div class="card-footer mb-3">
                            <a href="{{ route('barang.index')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>