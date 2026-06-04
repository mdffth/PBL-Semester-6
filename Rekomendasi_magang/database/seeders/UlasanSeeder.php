<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('ulasan')->insert([
                [
                    'name' => 'Daffa',
                    'position' => 'PT ARM Solusi',
                    'rating' => '4',
                    'review' => 'Saya merasa sangat terbantu dengan RekomIn. Platform ini membantu saya menemukan tempat magang yang sesuai dengan skill dan minat saya.',
                ],
                [
                    'name' => 'Isna',
                    'position' => 'PT Link Apisindo',
                    'rating' => '5',
                    'review' => 'Fitur rekomendasinya akurat banget! Tidak perlu bingung pilih tempat magang karena sistem langsung mencarikan yang paling cocok untuk saya.',
                ],
                [
                    'name' => 'Zaki',
                    'position' => 'Dinas Kominfo Jatim',
                    'rating' => '4',
                    'review' => 'Tampilan webnya bersih dan mudah digunakan. Informasi perusahaan lengkap, mulai dari posisi sampai info uang saku. Sangat recommended!',
                ],
                [
                    'name' => 'Rara',
                    'position' => 'Sarastya Innovations',
                    'rating' => '5',
                    'review' => 'Awalnya bingung mau magang di mana, tapi setelah isi form di RekomIn langsung dapet 5 rekomendasi relevan. Proses seleksinya jadi lebih terarah!',
                ],
                [
                    'name' => 'Faiz',
                    'position' => 'Timedoor Academy',
                    'rating' => '5',
                    'review' => 'Skor kesesuaiannya membantu banget buat nentuin prioritas. Saya pilih yang 95% match dan ternyata emang cocok banget sama ritme kerja saya',
                ],
                [
                    'name' => 'Aldi',
                    'position' => 'DLH Kota Surabaya',
                    'rating' => '5',
                    'review' => 'Sistem ini membantu saya yang masih semester 6 buat tahu perusahaan mana yang cocok sama IPK dan skill saya. Jadi lebih percaya diri waktu apply!',
            ],
        ]);
    }
}
