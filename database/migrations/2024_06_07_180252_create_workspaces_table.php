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
        Schema::create('workspaces', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->boolean('isReadOnly');
            $table->boolean('isOnDedicatedCapacity');
            $table->string('type');
            $table->string('name');
            $table->string('workspaceId');
            $table->uuid('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            // $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspaces');
    }
};
