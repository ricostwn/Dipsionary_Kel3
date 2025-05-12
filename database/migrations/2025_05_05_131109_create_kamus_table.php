<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('kamus')) {
            Schema::create('kamus', function (Blueprint $table) {
                $table->increments('id'); // atau istilah_id
                $table->string('istilah', 150);
                $table->string('cara_baca', 150);
                $table->text('penjelasan');
                $table->string('kategori', 50);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamus');
    }
};
