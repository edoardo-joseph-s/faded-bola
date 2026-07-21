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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 32)->unique();
            $table->dateTime('waktu_pesan');
            $table->string('status', 32)->default('Baru');
            $table->string('estimasi_harga', 50);
            $table->string('nama', 120);
            $table->string('telepon', 20);
            $table->string('email', 150)->default('');
            $table->string('layanan', 150);
            $table->string('ukuran', 100);
            $table->string('tipe_mobil', 120);
            $table->date('tanggal');
            $table->time('jam');
            $table->string('domisili', 40)->default('');
            $table->text('alamat');
            $table->text('catatan')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index('status');
            $table->index('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
