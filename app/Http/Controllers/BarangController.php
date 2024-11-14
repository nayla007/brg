<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class BarangController extends Controller
{
    public function listBarang ()
    {
        // Mengambil semua data barang dari tabel 'data_barang'
        $barang = DataBarang::all();

        return view('barang.index', compact('barang'));
    }

    public function tambahBarang()
    {
        return view('barang.create');
    }

    public function simpanBarang(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'idbarang' => 'required|unique:data_barang,idbarang|max:200',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|max:1999',
        ], [
            // Pesan kustom jika validasi gagal
            'idbarang.unique' => 'ID barang sudah terdaftar. Silahkan pilih id yang lain',
            'idbarang.required' => 'ID barang wajib di isi',
            'nama_barang.required' => 'Nama barang wajib di isi',
            'harga.required' => 'Harga wajib di isi',
            'stok.required' => 'stok wajib di isi',
            'foto.image' => 'foto harus berupa gambar',
        ]);

        // Jika ada foto yang diupload, simpan file foto tersebut
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            // Menyimpan foto ke folder 'fotos' di storage publik
            $fotoPath = $request->file('foto')->store('fotos', 'public');
        }

         // Menyimpan data barang baru ke database
        DataBarang::create([
            'idbarang' => $request->idbarang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $fotoPath,
        ]);

        session()->flash('success', 'Barang Berhasil ditambahkan');
        return redirect()->route('barang.index');
    }

    public function editBarang($idbarang)
    {
        try {
            // Mencari data barang berdasarkan ID
            $barang = DataBarang::findOrFail($idbarang);

        return view('barang.edit', compact('barang'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            // Menampilkan pesan error jika barang tidak ditemukan
            session()->flash('error', 'barang dengan Id ' . $idbarang . ' tidak ditemukan');
            return redirect()->route('barang.index');
        }
    }

    public function updateBarang(Request $request, $idbarang)
    {
        $request->validate([
            'idbarang' => 'required|max:200',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|max:1999',
        ]);


        $barang = DataBarang::findOrFail($idbarang);

        // Menyimpan data yang diubah dari form ke dalam variabel updateData
        $barang->idbarang = $request->input('idbarang');
        $barang->nama_barang = $request->input('nama_barang');
        $barang->harga = $request->input('harga');
        $barang->stok = $request->input('stok');

        // Ambil data yang diubah saja
        $updateData = $request->only(['idbarang', 'nama_barang', 'harga', 'stok',]);

        if($request->hasFile('foto')) {
            if($barang->foto && Storage::exists('public/'. $barang->foto)){
                Storage::delete('public/'. $barang->foto);
            }

            $fotoPath = $request->file('foto')->store('images', 'public');
            $updateData['foto'] = $fotoPath;
        }

        $barang->update($updateData);

        session()->flash('success', 'Barang Berhasil diupdate');
        return redirect()->route('barang.index');
    }

    public function hapusBarang($idbarang)
    {
        $barang = DataBarang::findOrFail($idbarang);

        $barang->delete();

        session()->flash('success', 'Barang Berhasil dihapus');
        return redirect()->route('barang.index');
    }

    public function detailBarang($idbarang)
    {
        try{
            $barang = DataBarang::findOrFail($idbarang);

            return view('barang.detail',compact('barang'));
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            session()->flash('error', 'Barang dengan ID ' . $idbarang . ' tidak ditemukan.');
            return redirect()->route('barang.index');
        }
    }
}
