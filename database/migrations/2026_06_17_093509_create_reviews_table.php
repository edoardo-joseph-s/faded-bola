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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 32);
            $table->dateTime('waktu_ulasan');
            $table->string('nama', 120);
            $table->unsignedTinyInteger('rating');
            $table->text('ulasan');
            $table->timestamp('created_at')->useCurrent();
            $table->unique(['kode', 'waktu_ulasan', 'nama', 'rating']);
            $table->index('kode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
