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
        Schema::create('carrito', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->unsignedBigInteger('id_pokemon');
            $table->integer('cantidad');
            $table->string('precio');
            $table->foreign('id_user')->references('dni')->on('users');
            $table->foreign('id_pokemon')->references('id')->on('pokemon');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
