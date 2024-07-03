<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    public function run() :void
    {
        // Proyek 1: Renovasi Kantor Pusat PT. Sejahtera
        DB::table('tasks')->insert([
            [
                'project_id' => 1,
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'status_id' => 1, // Ganti dengan ID status yang sesuai
                'description' => 'Survei dan Evaluasi Ruang Kerja yang Ada',
                'datetime' => '2024-05-20 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Rancang Desain Interior Baru',
                'datetime' => '2024-05-25 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Persetujuan Desain dari Manajemen PT. Sejahtera',
                'datetime' => '2024-05-28 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemilihan Kontraktor dan Penyedia Material',
                'datetime' => '2024-06-01 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Persiapan Area Kerja dan Pekerjaan Pemindahan Sementara',
                'datetime' => '2024-06-05 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Renovasi Lantai dan Dinding',
                'datetime' => '2024-06-10 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Instalasi Sistem AC dan Pencahayaan Baru',
                'datetime' => '2024-06-15 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan Furnitur dan Dekorasi Interior',
                'datetime' => '2024-06-20 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pengecekan Akhir dan Persiapan Pemindahan Kembali',
                'datetime' => '2024-06-25 23:59:59'
            ],
            [
                'project_id' => 1,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Uji Coba Fungsionalitas dan Penilaian Akhir',
                'datetime' => '2024-07-01 23:59:59'
            ],
        ]);

        // Proyek 2: Pembangunan Gedung Apartemen "Greenview Residence"
        DB::table('tasks')->insert([
            [
                'project_id' => 2,
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'status_id' => 1, // Ganti dengan ID status yang sesuai
                'description' => 'Persiapan Lahan dan Pemantapan Pondasi',
                'datetime' => '2024-09-01 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Konstruksi Struktur Utama Bangunan',
                'datetime' => '2024-09-10 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Instalasi Sistem Listrik dan Plumbing',
                'datetime' => '2024-09-20 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan Jendela dan Pintu',
                'datetime' => '2024-09-25 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Penyelesaian Interior dan Pemasangan Lantai',
                'datetime' => '2024-09-30 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan AC dan Sistem Keamanan',
                'datetime' => '2024-10-05 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan Kamar Mandi dan Dapur',
                'datetime' => '2024-10-10 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Finishing Eksterior dan Pengecatan',
                'datetime' => '2024-10-15 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Uji Coba Fasilitas Umum (Lift, Tangga Darurat, dll.)',
                'datetime' => '2024-10-20 23:59:59'
            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pembersihan dan Penyerahan Kunci kepada Pengelola',
                'datetime' => '2024-10-25 23:59:59'
            ],
        ]);

        // Proyek 3: Restorasi Bangunan Bersejarah "Tugu Pahlawan"
        DB::table('tasks')->insert([
            [
                'project_id' => 3,
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'status_id' => 1, // Ganti dengan ID status yang sesuai
                'description' => 'Evaluasi Kerusakan Struktural dan Arsitektural',
                'datetime' => '2024-07-01 23:59:59'
            ],
            [
                'project_id' => 3,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Persetujuan Desain Restorasi dari Pihak Berwenang',
                'datetime' => '2024-07-05 23:59:59'
            ],
            [
                'project_id' => 3,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemulihan Bahan-Bahan Bangunan Asli',
                'datetime' => '2024-07-10 23:59:59'
            ],
            [
                'project_id' => 3,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pembersihan dan Pemugaran Tugu',
                'datetime' => '2024-07-15 23:59:59'
            ],
            [
                'project_id' => 3,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Perbaikan Detail Arsitektural dan Ornamental',
                'datetime' => '2024-07-20 23:59:59'
            ],
            [
                'project_id' => 3,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan Pencahayaan dan Sistem Keamanan',
                'datetime' => '2024-07-25 23:59:59'
            ],
            [
                'project_id' => 3,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Uji Coba Fungsionalitas Sistem Elektronik',
                'datetime' => '2024-07-30 23:59:59'
            ],
            [
                'project_id' => 3,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pembersihan dan Penyerahan Kembali Area Restorasi',
                'datetime' => '2024-08-01 23:59:59'
            ],
        ]);

        // Proyek 4: Pembangunan Pabrik "Tekno Mega Industri"
        DB::table('tasks')->insert([
            [
                'project_id' => 4,
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'status_id' => 1, // Ganti dengan ID status yang sesuai
                'description' => 'Survey Lokasi dan Pemetaan Area',
                'datetime' => '2024-08-01 23:59:59'
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Desain Konstruksi Bangunan dan Infrastruktur',
                'datetime' => '2024-08-10 23:59:59'
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Persiapan Lahan dan Pekerjaan Pemantapan',
                'datetime' => '2024-08-20 23:59:59'
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Konstruksi Struktur Utama Bangunan Pabrik',
                'datetime' => '2024-08-30 23:59:59'
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan Sistem Listrik dan Teknologi Canggih',
                'datetime' => '2024-09-10 23:59:59'
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan Sistem Pengolahan Limbah dan Air',
                'datetime' => '2024-09-20 23:59:59'
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Finishing Interior dan Pengecatan',
                'datetime' => '2024-09-25 23:59:59'
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pengujian Sistem Produksi dan Kualitas',
                'datetime' => '2024-09-30 23:59:59'
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pembersihan dan Penyerahan Area Pabrik',
                'datetime' => '2024-10-05 23:59:59'
            ],
        ]);

        // Proyek 5: Renovasi Rumah Pribadi "Villa Harmoni"
        DB::table('tasks')->insert([
            [
                'project_id' => 5,
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'status_id' => 1, // Ganti dengan ID status yang sesuai
                'description' => 'Konsultasi Desain dengan Arsitek',
                'datetime' => '2024-10-01 23:59:59'
            ],
            [
                'project_id' => 5,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Persiapan dan Pemilihan Material Renovasi',
                'datetime' => '2024-10-05 23:59:59'
            ],
            [
                'project_id' => 5,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pembongkaran dan Persiapan Interior',
                'datetime' => '2024-10-10 23:59:59'
            ],
            [
                'project_id' => 5,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Renovasi Ruang Tamu dan Kamar Utama',
                'datetime' => '2024-10-15 23:59:59'
            ],
            [
                'project_id' => 5,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Instalasi Sistem Pencahayaan dan Listrik Baru',
                'datetime' => '2024-10-20 23:59:59'
            ],
            [
                'project_id' => 5,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan Peralatan Dapur dan Sistem HVAC',
                'datetime' => '2024-10-25 23:59:59'
            ],
            [
                'project_id' => 5,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pemasangan Lantai dan Finishing Interior',
                'datetime' => '2024-10-30 23:59:59'
            ],
            [
                'project_id' => 5,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pengecekan Akhir dan Penataan Taman',
                'datetime' => '2024-11-05 23:59:59'
            ],
            [
                'project_id' => 5,
                'user_id' => 1,
                'status_id' => 1,
                'description' => 'Pembersihan dan Penyerahan Kunci Rumah',
                'datetime' => '2024-11-10 23:59:59'
            ],
        ]);

    }
}
