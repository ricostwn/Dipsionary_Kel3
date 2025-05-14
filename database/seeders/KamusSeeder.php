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
            ['istilah' => 'Dekanat', 'cara_baca' => 'de-ka-nat', 'penjelasan' => 'Kantor administrasi fakultas yang dipimpin oleh Dekan. Tempat urus berkas di tingkat fakultas', 'kategori' => 'umum'],
            ['istilah' => 'Rektorat', 'cara_baca' => 'rek-to-rat', 'penjelasan' => 'Kantor pusat administrasi universitas, dipimpin oleh Rektor. Urusan umum seperti beasiswa, wisuda, dll.', 'kategori' => 'umum'],
            ['istilah' => 'UKM', 'cara_baca' => 'u-ka-em', 'penjelasan' => 'Unit Kegiatan Mahasiswa. Wadah pengembangan minat dan bakat mahasiswa di luar akademik.', 'kategori' => 'umum'],
            ['istilah' => 'Sempro', 'cara_baca' => 'sem-pro', 'penjelasan' => 'Seminar Proposal. Presentasi awal proposal Tugas Akhir atau skripsi.', 'kategori' => 'umum'],
            ['istilah' => 'Semhas', 'cara_baca' => 'sem-has', 'penjelasan' => 'Seminar Hasil. Presentasi hasil penelitian sebelum sidang akhir skripsi.', 'kategori' => 'umum'],
            ['istilah' => 'BEM', 'cara_baca' => 'bem', 'penjelasan' => 'Badan Eksekutif Mahasiswa. Organisasi mahasiswa tingkat universitas atau fakultas yang menjalankan fungsi eksekutif.', 'kategori' => 'umum'],
            ['istilah' => 'Himpunan', 'cara_baca' => 'him-pu-nan', 'penjelasan' => 'Organisasi mahasiswa di tingkat jurusan atau prodi. Fungsinya mirip BEM tapi lebih fokus ke lingkup program studi.', 'kategori' => 'umum'],
            ['istilah' => 'Dosbing', 'cara_baca' => 'dos-bing', 'penjelasan' => 'Dosen Pembimbing Akademik. Dosen yang membimbing akademik dan studi mahasiswa.', 'kategori' => 'umum'],
            ['istilah' => 'Rektor', 'cara_baca' => 'rek-tor', 'penjelasan' => 'Pimpinan tertinggi universitas. Bertanggung jawab atas jalannya seluruh kegiatan akademik dan administratif.', 'kategori' => 'umum'],
            ['istilah' => 'Dekan', 'cara_baca' => 'de-kan', 'penjelasan' => 'Pimpinan tertinggi di tingkat fakultas. Mengatur kegiatan akademik dan administrasi fakultas.', 'kategori' => 'umum'],
            ['istilah' => 'Kadep', 'cara_baca' => 'ka-dep', 'penjelasan' => 'Pimpinan tertinggi di tingkat departemen/program studi. Mengatur kegiatan akademik dan administrasi departemen/program studi.', 'kategori' => 'umum'],
            ['istilah' => 'Senat', 'cara_baca' => 'se-nat', 'penjelasan' => 'Badan legislatif mahasiswa di tingkat fakultas atau universitas. Berfungsi membuat aturan organisasi dan mengawasi kinerja BEM atau lembaga eksekutif lainnya.', 'kategori' => 'umum'],
            ['istilah' => 'NIM', 'cara_baca' => 'nim', 'penjelasan' => 'Nomor Induk Mahasiswa. Nomor identitas unik yang diberikan kepada setiap mahasiswa selama masa studi di perguruan tinggi.', 'kategori' => 'umum'],
            ['istilah' => 'Mata kuliah', 'cara_baca' => 'ma-ta ku-li-ah', 'penjelasan' => 'Satuan pelajaran yang diajarkan dan dipelajari oleh mahasiswa di tingkat perguruan tinggi, serupa dengan mata pelajaran di sekolah.', 'kategori' => 'umum'],
            ['istilah' => 'Dosen', 'cara_baca' => 'do-sen', 'penjelasan' => 'Seorang pendidik profesional yang bekerja di perguruan tinggi dan memiliki tugas utama untuk mengajar, mengembangkan, dan menyebarluaskan ilmu pengetahuan, teknologi, dan seni kepada mahasiswa.', 'kategori' => 'umum'],
            ['istilah' => 'Magang', 'cara_baca' => 'ma-gang', 'penjelasan' => 'Program pembelajaran di mana mahasiswa mendapatkan pengalaman kerja langsung di dunia industri atau lembaga terkait.', 'kategori' => 'umum'],
            ['istilah' => 'Mahasiswa', 'cara_baca' => 'ma-ha-sis-wa', 'penjelasan' => 'Peserta didik yang sedang menempuh pendidikan tinggi di sebuah perguruan tinggi seperti universitas, institut, sekolah tinggi, atau akademi.', 'kategori' => 'umum'],
            ['istilah' => 'Semester', 'cara_baca' => 'se-mes-ter', 'penjelasan' => 'Satuan waktu pembelajaran yang terdiri dari sekitar 16 minggu, yang biasanya dibagi menjadi semester ganjil (awal tahun akademik) dan semester genap (tengah tahun akademik). Satu semester kuliah umumnya berlangsung selama 6 bulan.', 'kategori' => 'umum'],

            // === KATEGORI DIPS ===
            ['istilah' => 'Dipyo', 'cara_baca' => 'dip-yo', 'penjelasan' => 'Undip Tayo. Bus kampus Universitas Diponegoro, diluncurkan pada Oktober 2022. Bus kampus ini hadir sebagai solusi transportasi yang nyaman, ramah lingkungan, dan bebas biaya bagi para mahasiswa dan dosen.', 'kategori' => 'dips'],
            ['istilah' => 'Widya Puraya', 'cara_baca' => 'wid-ya pu-ra-ya', 'penjelasan' => 'Gedung rektorat Undip yang terletak di kawasan Tembalang. Merupakan pusat administrasi universitas.', 'kategori' => 'dips'],
            ['istilah' => 'Patung Diponegoro', 'cara_baca' => 'pa-tung di-po-ne-go-ro', 'penjelasan' => 'Landmark ikonik Undip berupa patung Pangeran Diponegoro yang sedang menunggang kuda. Sering jadi titik kumpul atau simbol Undip.', 'kategori' => 'dips'],
            ['istilah' => 'Taman Inspirasi', 'cara_baca' => 'ta-man in-spi-ra-si', 'penjelasan' => 'Area terbuka di lingkungan Undip, sering digunakan untuk diskusi, istirahat, atau kegiatan kreatif mahasiswa. Lokasinya berada persis di depan area Widya Puraya.', 'kategori' => 'dips'],
            ['istilah' => 'Foodtruck', 'cara_baca' => 'fut-trak', 'penjelasan' => 'Program makanan sehat gratis dari Undip untuk mahasiswa. Sistemnya rebutan cepat (war) dan terbatas kuota.', 'kategori' => 'dips'],
            ['istilah' => 'SC', 'cara_baca' => 'es-ce', 'penjelasan' => 'Student Center. Gedung atau area pusat kegiatan mahasiswa, biasanya tempat sekretariat organisasi kampus.', 'kategori' => 'dips'],
            ['istilah' => 'Muladi Dome', 'cara_baca' => 'mu-la-di dom', 'penjelasan' => 'Gedung serbaguna besar di Undip, sering dipakai untuk wisuda, seminar, konser, dan event skala besar.', 'kategori' => 'dips'],
            ['istilah' => 'ODM', 'cara_baca' => 'o-de-em', 'penjelasan' => 'Orientasi Diponegoro Muda. Program orientasi atau pengenalan kampus untuk mahasiswa baru Undip.', 'kategori' => 'dips'],
            ['istilah' => 'DipoHub', 'cara_baca' => 'di-po-hab', 'penjelasan' => 'Fasilitas yang disediakan Universitas Diponegoro untuk semua civitas academica Undip dan masyarakat sebagai tempat berkumpul, berkolaborasi, dan berkreasi. Tempat ini seperti cafe sehingga diharapkan dapat menjadi tempat yang nyaman untuk makan sembari menikmati musik dan bermain game.', 'kategori' => 'dips'],
            ['istilah' => 'UDID', 'cara_baca' => 'yu-di-di', 'penjelasan' => 'Undip Digital Innovation Development. Platform digital dan sistem teknologi informasi internal Undip.', 'kategori' => 'dips'],
            ['istilah' => 'SIAP Undip', 'cara_baca' => 'si-ap un-dip', 'penjelasan' => 'Sistem Informasi Akademik Universitas Diponegoro. Digunakan untuk mengisi KRS, melihat nilai, dan informasi akademik lainnya.', 'kategori' => 'dips'],
            ['istilah' => 'Ganeo', 'cara_baca' => 'ga-ne-o', 'penjelasan' => 'Garuda Diponegoro. Melambangkan Diponegoro Muda menjunjung tinggi semangat Pancasila yang bervisi berbeda-beda tetapi tetap satu, dan berjuang untuk Indonesia.', 'kategori' => 'dips'],
        ];

        DB::table('kamus')->insert($data);
    }
}