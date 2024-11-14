<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Barang</title>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center mb-4">List Barang</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('barang.tambah')}}" class="btn btn-primary">Create Barang</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hovered table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($barang as $item)
                                <tr>
                                    <td>{{ $item->idbarang}}</td>
                                    <td>{{ $item->nama_barang}}</td>
                                    <!-- Harga barang diambil dari objek $barang, diformat ke dalam format mata uang -->
                                    <td>Rp {{number_format($item->harga, 0, ',', '.')}}</td>
                                    <td>{{ $item->stok}}</td>
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('storage/'. $item->foto)}}" alt="Foto Barang" width="100">
                                        @else
                                            <span>No Foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('barang.edit', $item->idbarang)}}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('barang.detail', $item->idbarang) }}" class="btn btn-info btn-sm">Detail</a>
                                        <form action="{{ route('barang.hapus', $item->idbarang) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus barang ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>