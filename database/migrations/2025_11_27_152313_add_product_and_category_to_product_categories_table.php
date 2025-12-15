<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Migration ini dikosongkan karena kolom product_id & category_id
     * sudah dibuat di create_product_categories_table.
     */
    public function up(): void
    {
        // Tidak melakukan apa-apa
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak melakukan apa-apa juga
    }
};
