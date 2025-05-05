<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id(); // kolom ID auto-increment
            $table->string('nama', 50)->unique(); // nama kategori (umum/dips)
        });

        // Tambahkan data awal
        DB::table('kategori')->insert([
            ['nama' => 'umum'],
            ['nama' => 'dips'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
