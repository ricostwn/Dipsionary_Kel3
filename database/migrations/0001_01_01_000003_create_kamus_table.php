<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kamus', function (Blueprint $table) {
            $table->id('istlah_id');
            $table->string('istilah');
            $table->string('cara_baca');
            $table->text('penjelasan');
            $table->string('kategori'); // Umum atau DIPS
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamus');
    }
}
