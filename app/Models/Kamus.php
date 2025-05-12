<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamus extends Model
{
    // Nama tabel di database
    protected $table = 'kamus';

    // Primary key dari tabel
    protected $primaryKey = 'istilah_id';

    // Tidak menggunakan timestamps (created_at & updated_at)
    public $timestamps = false;

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'istilah',
        'cara_baca',
        'penjelasan',
        'kategori',
    ];
}
