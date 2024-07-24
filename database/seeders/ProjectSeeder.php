<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('projects')->insert([
        //   [
        //     'status_id' => 1,
        //     'name' => 'Renovasi Kantor Pusat PT. Sejahtera - Budi Susanto | Jakarta Selatan, DKI Jakarta',
        //     'slug' => 'renovasi-kantor-pusat-pt-sejahtera-budi-susanto-jakarta-selatan',
        //     'description' => 'Merenovasi kantor pusat PT. Sejahtera dengan desain modern dan peningkatan ruang kerja.',
        //     'deadline' => '2024-08-5 23:59:59',
        //     'duration' => '2024-08-5 23:59:59'
        //   ],  
        //   [
        //     'status_id' => 2,
        //     'name' => 'Membangun gedung apartemen baru "Greenview Residence" - Sarah Tan -Jawa Barat',
        //     'slug' => 'membangun-gedung-apartemen-baru-greenview-residence-sarah-tan',
        //     'description' => ' Membangun gedung apartemen baru "Greenview Residence" dengan fasilitas lengkap dan arsitektur yang menarik.',
        //     'deadline' => '2024-12-5 23:59:59'
        //   ],  
        //   [
        //     'status_id' => 2,
        //     'name' => 'Restorasi Bangunan Bersejarah "Tugu Pahlawan" - Ahmad Hadi | Surabaya, Jawa Timur',
        //     'slug' => 'restorasi-bangunan-bersejarah-tugu-pahlawan-ahmad-hadi-surabaya',
        //     'description' => 'Merestorasi bangunan bersejarah "Tugu Pahlawan" untuk mempertahankan nilai sejarah dan keindahannya.',
        //     'deadline' => '2024-07-25 23:59:59'
        //   ],  
        //   [
        //     'status_id' => 1,
        //     'name' => 'Desain Eksterior Rumah Tinggal "Villa Indah" - Maria Wong | Bali',
        //     'slug' => 'desain-eksterior-rumah-tinggal-villa-indah-maria-wong-bali',
        //     'description' => 'Mendesain ulang eksterior rumah tinggal "Villa Indah" untuk meningkatkan tampilan dan fungsi ruang.',
        //     'deadline' => '2024-08-10 23:59:59'
        //   ],  
        //   [
        //     'status_id' => 3,
        //     'name' => 'Pembangunan Taman Kota "Harapan Hijau" - Indra Sutanto | Semarang, Jawa Tengah',
        //     'slug' => 'pembangunan-taman-kota-harapan-hijau-indra-sutanto-semarang
        //     ',
        //     'description' => 'Membangun taman kota "Harapan Hijau" dengan konsep ramah lingkungan dan area rekreasi publik.',
        //     'deadline' => '2024-09-15 23:59:59'
        //   ],  
        //   [
        //     'status_id' => 4,
        //     'name' => 'Renovasi Interior Apartemen "Skyview Residence" - Linda Tjandra | Surabaya, Jawa Timur',
        //     'slug' => 'renovasi-interior-apartemen-skyview-residence-linda-tjandra',
        //     'description' => 'Merenovasi interior apartemen "Skyview Residence" dengan sentuhan modern dan fungsional.',
        //     'deadline' => '2024-08-20 23:59:59'
        //   ],  
        // ]);
    }
}
