<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // === KATEGORI UMUM ===
            ['istilah' => 'SKS', 'cara_baca' => 'es-ka-es', 'penjelasan' => 'Satuan Kredit Semester. Ukuran beban studi mahasiswa, dosen, dan kegiatan pembelajaran. 1 SKS setara dengan ±50 menit tatap muka per minggu selama 1 semester.', 'kategori' => 'umum'],
            ['istilah' => 'IRS', 'cara_baca' => 'i-er-es', 'penjelasan' => 'Isian Rencana Studi. Formulir yang diisi mahasiswa untuk memilih mata kuliah yang akan diambil dalam satu semester.', 'kategori' => 'umum'],
            ['istilah' => 'KRS', 'cara_baca' => 'ka-er-es', 'penjelasan' => 'Kartu Rencana Studi. Dokumen resmi yang mencatat mata kuliah yang akan diambil oleh mahasiswa dalam satu semester.', 'kategori' => 'umum'],
            ['istilah' => 'KHS', 'cara_baca' => 'ka-ha-es', 'penjelasan' => 'Kartu Hasil Studi. Laporan nilai hasil belajar mahasiswa selama satu semester.', 'kategori' => 'umum'],
            ['istilah' => 'IP', 'cara_baca' => 'i-pe', 'penjelasan' => 'Indeks Prestasi. Nilai rata-rata hasil belajar mahasiswa dalam satu semester.', 'kategori' => 'umum'],
            ['istilah' => 'IPK', 'cara_baca' => 'i-pe-ka', 'penjelasan' => 'Indeks Prestasi Kumulatif. Nilai rata-rata kumulatif dari semua semester yang telah ditempuh.', 'kategori' => 'umum'],
            ['istilah' => 'TA', 'cara_baca' => 'te-a', 'penjelasan' => 'Tugas Akhir. Proyek atau penelitian akhir yang harus diselesaikan mahasiswa sebagai syarat kelulusan.', 'kategori' => 'umum'],
            ['istilah' => 'KP', 'cara_baca' => 'ka-pe', 'penjelasan' => 'Kerja Praktik. Program magang atau praktik kerja lapangan yang menjadi bagian dari kurikulum.', 'kategori' => 'umum'],
            ['istilah' => 'UKT', 'cara_baca' => 'u-ka-te', 'penjelasan' => 'Uang Kuliah Tunggal. Skema pembayaran kuliah dengan sistem tunggal yang ditetapkan per mahasiswa per semester.', 'kategori' => 'umum'],
            ['istilah' => 'SP', 'cara_baca' => 'es-pe', 'penjelasan' => 'Semester Pendek. Semester tambahan di luar semester reguler untuk memperbaiki nilai atau mengejar ketertinggalan.', 'kategori' => 'umum'],
            // (lanjutkan entri umum 11–28 sesuai pola)

            // === KATEGORI DIPS ===
            ['istilah' => 'Dipyo', 'cara_baca' => 'dip-yo', 'penjelasan' => 'Undip Tayo. Bus kampus Universitas Diponegoro, diluncurkan pada Oktober 2022. Bus kampus ini hadir sebagai solusi transportasi yang nyaman, ramah lingkungan, dan bebas biaya bagi para mahasiswa dan dosen.', 'kategori' => 'dips'],
            ['istilah' => 'Widya Puraya', 'cara_baca' => 'wid-ya pu-ra-ya', 'penjelasan' => 'Gedung rektorat Undip yang terletak di kawasan Tembalang. Merupakan pusat administrasi universitas.', 'kategori' => 'dips'],
            ['istilah' => 'Patung Diponegoro', 'cara_baca' => 'pa-tung di-po-ne-go-ro', 'penjelasan' => 'Landmark ikonik Undip berupa patung Pangeran Diponegoro yang sedang menunggang kuda. Sering jadi titik kumpul atau simbol Undip.', 'kategori' => 'dips'],
            ['istilah' => 'Taman Inspirasi', 'cara_baca' => 'ta-man in-spi-ra-si', 'penjelasan' => 'Area terbuka di lingkungan Undip, sering digunakan untuk diskusi, istirahat, atau kegiatan kreatif mahasiswa. Lokasinya berada persis di depan area Widya Puraya.', 'kategori' => 'dips'],
            ['istilah' => 'Foodtruck', 'cara_baca' => 'fut-trak', 'penjelasan' => 'Program makanan sehat gratis dari Undip untuk mahasiswa. Sistemnya rebutan cepat (war) dan terbatas kuota.', 'kategori' => 'dips'],
            // (lanjutkan entri dips 6–14 sesuai pola)
        ];

        DB::table('kamus')->insert($data);
    }
}
