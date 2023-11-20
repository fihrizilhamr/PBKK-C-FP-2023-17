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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('Email');
            $table->string('Password')->default('');
            $table->string('Nama');
            $table->date('TL');
            $table->string('Alamat');
            $table->string('NHP');
            $table->string('Gender');
            $table->string('Lokasi');
            $table->string('Foto')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
