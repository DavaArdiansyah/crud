<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('IdBuku');
            $table->string('Judul');
            $table->string('Genre');
            $table->string('Penerbit');
            $table->string('Pengarang');
            $table->date('Tanggal_Terbit');
            $table->string('Toko_Distributor');
            $table->string('Jumlah_Buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
