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
        // Patikrinimas, ar lentelė jau egzistuoja
        if (! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id(); // 'id' jau yra unikalus ir auto-increment
                $table->timestamps();
                $table->string('name');
                $table->string('surname');
                $table->string('email'); // `email` turi būti unikalus
                $table->string('password');
            });
        }

        // Sukuriame sessions lentelę
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Naudojame 'id' kaip pirminį raktą
            $table->foreignId('user_id')     // Užsienio raktas į users lentelę
                ->nullable()
                ->constrained('users') // Nustatome ryšį su users lentele
                ->onDelete('cascade'); // Jei vartotojas ištrinamas, ištrinami ir sesijos
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};
