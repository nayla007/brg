<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Edit Barang</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.update', $barang->idbarang)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="idbarang">Id</label>
                            <input type="text" class="form-control" name="idbarang" id="idbarang" value="{{ old('idbarang', $barang->idbarang) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $barang->nama_barang)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga', $barang->harga)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" value="{{ old('stok', $barang->stok)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                            @if($barang->foto)
                                <p class="mt-2">Foto Lama: <img src="{{ asset('storage/'. $barang->foto) }}" alt="Foto Barang" style="max-width: 200px;"></p>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('barang.index') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>