<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Barang</title>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center mb-4">Tambah Barang</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.simpan') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="idbarang">Id</label>
                                <input type="text" class="form-control" name="idbarang" id="idbarang" placeholder="Masukkan Id" required>
                                <!-- Menampilkan pesan error untuk 'idbarang' -->
                                @error('idbarang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" required>
                                @error('nama_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan Stok" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" name="foto" id="foto" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('barang.index')}}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>