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
        Schema::create('users', function (Blueprint $table) {
            $table->string('dni',9);
            $table->string('nick',20);
            $table->string('nombre',20);
            $table->string('apellidos',30);
            $table->string('email',50);
            $table->string('password',255);
            $table->date('fecha_nacimiento');
            $table->string('rol');
            $table->primary('dni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
