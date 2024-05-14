@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('buku.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Judul</label>
                <input type="text" class="form-control" name="Judul" id="judul">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Genre</label>
                <input type="text" class="form-control" name="Genre" id="genre">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Pegarang</label>
                <input type="text" class="form-control" name="Pengarang" id="pegarang">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Penerbit</label>
                <input class="form-control" name="Penerbit" id="penerbit">
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">TanggalTerbit</label>
                <input type="date" class="form-control" name="Tanggal_Terbit" id="TanggalT">
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">Toko Distributor</label>
                <input type="text" class="form-control" name="Toko_Distributor" id="Toko_Distributor">
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">Jumlah Buku</label>
                <input type="text" class="form-control" name="Jumlah_Buku" id="Jumlah_Buku">
            </div>
            <button type="submit" class="btn btn-primary float-end">Simpan</button>
        </form>
    </div>
@endsection
