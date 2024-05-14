<?php

use App\Models\Buku;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('buku.index');
    });
    Route::resource('buku', App\Http\Controllers\BukuController::class);
    Route::post('buku/import', [App\Http\Controllers\BukuController::class, 'import'])
        ->name('buku.import');
});


//catatan : 
//menggunakan ->name(); agar jika url nya panjang kita cukup memanggil dengan name tersebut
//contoh : route::get('crud/buku/tambah-data')->name('buku.tambah')
//penjelasan : kita tidak harus menulis url tersebut melainkan bisa memanggil menggunakan name route tersebut
//contoh : return redirect()->route('buku.tambah');
//
//pada route untuk menampilkan halaman input tidak menggunakan controller dikarenakan langsung dipanggil di route tersebut 
//
//Route::middleware(['auth'])->group(function () {});
//penjelasan : route route yang berada di dalam group dengan middleware auth tidak akan bisa dibuka jika user tidak melakukan login.
//             Jika user mengakses route dengan method get akan langsung di alihkan ke halaman login