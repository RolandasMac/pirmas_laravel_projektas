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
        Schema::create('products', function (Blueprint $table) {
            $table->id();                    // Pirminis raktas (primary key)
            $table->string('title');         // Produkto pavadinimas
            $table->text('description');     // Produkto aprašymas
            $table->decimal('price', 10, 2); // Produkto kaina (10 skaitmenų, 2 po kablelio)

            $table->foreignId('user_id') // Užsienio raktas (foreign key)
                ->constrained('users')       // Susieja su 'users' lentele
                ->onDelete('cascade');       // Trina produktą, jei vartotojas ištrintas

            $table->timestamps(); // Sukuria created_at ir updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
