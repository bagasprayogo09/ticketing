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
        Schema::create('kategorimasalah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('divisions_id');
            $table->string('status')->default('active');
            $table->timestamps();

            // Adding the foreign key constraint
            $table->foreign('divisions_id')->references('id')->on('divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategorimasalah');
    }
};
