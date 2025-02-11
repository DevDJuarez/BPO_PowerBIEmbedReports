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
        Schema::create('reportes', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('reportType');
            $table->string('name');
            $table->text('webUrl');
            $table->text('embedUrl');
            $table->string('datasetId');
            $table->string('reportId');
            $table->uuid('workspace_id');
            $table->foreign('workspace_id')->references('id')->on('workspaces')->onDelete('cascade');
            // $table->foreignId('workspace_id')->constrained('workspaces')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
