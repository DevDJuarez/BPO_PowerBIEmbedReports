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
        Schema::create('empresas', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('usuario');
            $table->text('clave');
            $table->string('client_id');
            $table->string('client_secret');
            $table->text('token')->nullable();
            $table->text('refresh_token')->nullable();
            $table->datetime('fecha_expiracion_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
