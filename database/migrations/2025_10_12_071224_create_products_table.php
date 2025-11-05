<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');                // nama produk
            $table->string('product_code');                // nama produk
            $table->date('tanggal_masuk'); // deskripsi produk (boleh kosong)
            $table->string('quantity');                // nama produk
            $table->decimal('price');       // harga
            $table->timestamps();                  // waktu dibuat & diupdate
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
