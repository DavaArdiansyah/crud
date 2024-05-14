<?php

namespace App\Http\Controllers;

use App\Imports\BukuImport;
use App\Models\Buku;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    public function index(Request $request) //menampilkan crud
    {
        $search = request()->input('search');
        $data = Buku::query();

        if ($search) {
            $data->where(function ($query) use ($search) {
                $query->where('Judul', 'like', '%' . $search . '%')
                    ->orWhere('Genre', 'like', '%' . $search . '%')
                    ->orWhere('Penerbit', 'like', '%' . $search . '%')
                    ->orWhere('Pengarang', 'like', '%' . $search . '%')
                    ->orWhere('Tanggal_Terbit', 'like', '%' . $search . '%');
            });
        }

        $data = $data->get();
        // $data = $data->paginate(5);

        return view('buku.index', compact('data'));
    }

    public function create()
    {
        return view('buku.inputData');
    }
    public function store(Request $request) //proses membuat database sesuai dengan yang di input
    {
        $data = Buku::create([
            'Judul' => $request->input('Judul'),
            'Genre' => $request->input('Genre'),
            'Penerbit' => $request->input('Penerbit'),
            'Pengarang' => $request->input('Pengarang'),
            'Tanggal_Terbit' => $request->input('Tanggal_Terbit'),
            'Toko_Distributor' => $request->input('Toko_Distributor'),
            'Jumlah_Buku' => $request->input('Jumlah_Buku'),
        ]);
        return redirect()->route('buku.index');
    }

    public function edit($IdBuku) //menampilkan halaman edit
    {
        $data = Buku::where('IdBuku', $IdBuku)->first();
        return view('buku.editData', compact('data'));
    }

    public function update($IdBuku, Request $request) //proses update database sesuai dengan yang di input
    {
        $data = Buku::where('IdBuku', $IdBuku)
            ->where('IdBuku', $IdBuku)
            ->update([
                'Judul' => $request->input('Judul'),
                'Genre' => $request->input('Genre'),
                'Pengarang' => $request->input('Pengarang'),
                'Penerbit' => $request->input('Penerbit'),
                'Tanggal_Terbit' => $request->input('Tanggal_Terbit'),
                'Toko_Distributor' => $request->input('Toko_Distributor'),
                'Jumlah_Buku' => $request->input('Jumlah_Buku'),
            ]);

        return redirect()->route('buku.index')->with('alert', 'Buku berhasil diperbarui.');
    }

    public function destroy($IdBuku)
    {
        // Melakukan validasi apakah buku dengan ID yang diberikan ada
        $data = buku::where('IdBuku', $IdBuku)
            ->where('IdBuku', $IdBuku)
            ->delete();
        // Jika buku ditemukan, tampilkan halaman konfirmasi penghapusan
        return redirect()->route('buku.index');
    }

    public function import(Request $request)
    {
        // return ($request);
        Excel::import(new BukuImport, $request->file('file'));
        return redirect()->route('buku.index');
    }
}
