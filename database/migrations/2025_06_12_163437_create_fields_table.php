<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Pemilik lapangan
            $table->string('name');
            $table->string('photo')->nullable(); // Foto lapangan
            $table->integer('price'); // Harga per jam
            $table->time('start_time'); // Jam buka
            $table->time('end_time');   // Jam tutup
            $table->date('available_from'); // Tanggal mulai tersedia
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
