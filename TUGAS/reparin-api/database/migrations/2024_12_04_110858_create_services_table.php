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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai primary key
            $table->string('image'); // URL gambar (string)
            $table->string('name'); // Nama (string)
            $table->text('description'); // Deskripsi (teks panjang)
            $table->string('category'); // Kategori (string)
            $table->string('price_range'); // Rentang harga (string)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
