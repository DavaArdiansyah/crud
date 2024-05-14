@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2>Perpustakaan</h2>
        <form action="{{ route('buku.index') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="search" name="search" placeholder="Masukkan Judul Buku  ...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form> <br>
        <a href="{{ route('buku.create') }}" type="button" class="btn btn-primary">Tambah</a>
        <form action="{{ route('buku.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="file" name="file">
                <button type="submit">Import</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                    <th>Toko Distributor</th>
                    <th>Jumlah Buku</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->Judul }}</td>
                        <td>{{ $d->Genre }}</td>
                        <td>{{ $d->Pengarang }}</td>
                        <td>{{ $d->Penerbit }}</td>
                        <td>{{ $d->Tanggal_Terbit }}</td>
                        <td>{{ $d->Toko_Distributor }}</td>
                        <td>{{ $d->Jumlah_Buku }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Aksi">
                                <a href="{{ route('buku.edit', $d->IdBuku) }}" class="btn btn-warning me-2">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $d->IdBuku }}">Delete</button>

                                <div class="modal fade" id="exampleModal{{ $d->IdBuku }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tidak</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('destroy-form{{ $d->IdBuku }}').submit();">Yakin</button>
                                                <form id="destroy-form{{ $d->IdBuku }}"
                                                    action="{{ route('buku.destroy', $d->IdBuku) }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
