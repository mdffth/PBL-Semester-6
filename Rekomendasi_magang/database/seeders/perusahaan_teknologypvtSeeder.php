<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class perusahaan_teknologypvtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perusahaan_posisi')->insert([
            ['perusahaan_id' => 1, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 1, 'minat_bidang_id' => 3],
            ['perusahaan_id' => 1, 'minat_bidang_id' => 37],
            ['perusahaan_id' => 1, 'minat_bidang_id' => 19],
            ['perusahaan_id' => 1, 'minat_bidang_id' => 32],
            
            ['perusahaan_id' => 2, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 2, 'minat_bidang_id' => 19],
            ['perusahaan_id' => 2, 'minat_bidang_id' => 36],
            ['perusahaan_id' => 2, 'minat_bidang_id' => 62],
            ['perusahaan_id' => 2, 'minat_bidang_id' => 39],
            ['perusahaan_id' => 2, 'minat_bidang_id' => 22],
           
            ['perusahaan_id' => 3, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 3, 'minat_bidang_id' => 34],
            ['perusahaan_id' => 3, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 3, 'minat_bidang_id' => 36],
            ['perusahaan_id' => 3, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 3, 'minat_bidang_id' => 37],

            ['perusahaan_id' => 4, 'minat_bidang_id' => 46],
            ['perusahaan_id' => 4, 'minat_bidang_id' => 43],
            ['perusahaan_id' => 4, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 4, 'minat_bidang_id' => 37],
            ['perusahaan_id' => 4, 'minat_bidang_id' => 8],

            ['perusahaan_id' => 5, 'minat_bidang_id' => 33],
            ['perusahaan_id' => 5, 'minat_bidang_id' => 2],
            ['perusahaan_id' => 5, 'minat_bidang_id' => 6],
            ['perusahaan_id' => 5, 'minat_bidang_id' => 37],

            ['perusahaan_id' => 6, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 6, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 6, 'minat_bidang_id' => 36],
            ['perusahaan_id' => 6, 'minat_bidang_id' => 14],
            ['perusahaan_id' => 6, 'minat_bidang_id' => 60],
            ['perusahaan_id' => 6, 'minat_bidang_id' => 50],

            ['perusahaan_id' => 7, 'minat_bidang_id' => 8],
            ['perusahaan_id' => 7, 'minat_bidang_id' => 37],
            ['perusahaan_id' => 7, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 7, 'minat_bidang_id' => 12],
            ['perusahaan_id' => 7, 'minat_bidang_id' => 11],

            ['perusahaan_id' => 8, 'minat_bidang_id' => 22],
            ['perusahaan_id' => 8, 'minat_bidang_id' => 11],
            ['perusahaan_id' => 8, 'minat_bidang_id' => 10],

            ['perusahaan_id' => 9, 'minat_bidang_id' => 12],
            ['perusahaan_id' => 9, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 9, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 9, 'minat_bidang_id' => 2],

            ['perusahaan_id' => 10, 'minat_bidang_id' => 68],
            ['perusahaan_id' => 10, 'minat_bidang_id' => 39],
            ['perusahaan_id' => 10, 'minat_bidang_id' => 10],
            ['perusahaan_id' => 10, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 10, 'minat_bidang_id' => 6],

            ['perusahaan_id' => 11, 'minat_bidang_id' => 15],
            ['perusahaan_id' => 11, 'minat_bidang_id' => 17],

            ['perusahaan_id' => 12, 'minat_bidang_id' => 6],
            ['perusahaan_id' => 12, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 12, 'minat_bidang_id' => 23],
            ['perusahaan_id' => 12, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 12, 'minat_bidang_id' => 33],
            ['perusahaan_id' => 12, 'minat_bidang_id' => 69],
            ['perusahaan_id' => 12, 'minat_bidang_id' => 70],

            ['perusahaan_id' => 13, 'minat_bidang_id' => 70],
            ['perusahaan_id' => 13, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 13, 'minat_bidang_id' => 6],
            ['perusahaan_id' => 13, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 13, 'minat_bidang_id' => 4],
            ['perusahaan_id' => 13, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 13, 'minat_bidang_id' => 33],
            ['perusahaan_id' => 13, 'minat_bidang_id' => 39],

            ['perusahaan_id' => 14, 'minat_bidang_id' => 25],
            ['perusahaan_id' => 14, 'minat_bidang_id' => 71],

            ['perusahaan_id' => 15, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 15, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 15, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 15, 'minat_bidang_id' => 34],
            ['perusahaan_id' => 15, 'minat_bidang_id' => 14],
            ['perusahaan_id' => 15, 'minat_bidang_id' => 26],

            ['perusahaan_id' => 16, 'minat_bidang_id' => 14],
            ['perusahaan_id' => 16, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 16, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 16, 'minat_bidang_id' => 34],
            ['perusahaan_id' => 16, 'minat_bidang_id' => 19],
            ['perusahaan_id' => 16, 'minat_bidang_id' => 39],

            ['perusahaan_id' => 17, 'minat_bidang_id' => 14],
            ['perusahaan_id' => 17, 'minat_bidang_id' => 3],
            ['perusahaan_id' => 17, 'minat_bidang_id' => 15],

            ['perusahaan_id' => 18, 'minat_bidang_id' => 25],

            ['perusahaan_id' => 19, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 19, 'minat_bidang_id' => 18],
            ['perusahaan_id' => 19, 'minat_bidang_id' => 19],
            ['perusahaan_id' => 19, 'minat_bidang_id' => 21],
            ['perusahaan_id' => 19, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 19, 'minat_bidang_id' => 24],

            ['perusahaan_id' => 20, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 20, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 20, 'minat_bidang_id' => 34],
            ['perusahaan_id' => 20, 'minat_bidang_id' => 70],
            ['perusahaan_id' => 20, 'minat_bidang_id' => 39],
            ['perusahaan_id' => 20, 'minat_bidang_id' => 22],

            ['perusahaan_id' => 21, 'minat_bidang_id' => 28],
            ['perusahaan_id' => 21, 'minat_bidang_id' => 30],
            ['perusahaan_id' => 21, 'minat_bidang_id' => 31],
            ['perusahaan_id' => 21, 'minat_bidang_id' => 25],

            ['perusahaan_id' => 22, 'minat_bidang_id' => 30],
            ['perusahaan_id' => 22, 'minat_bidang_id' => 73],
            ['perusahaan_id' => 22, 'minat_bidang_id' => 59],
            ['perusahaan_id' => 22, 'minat_bidang_id' => 60],
            ['perusahaan_id' => 22, 'minat_bidang_id' => 40],
            ['perusahaan_id' => 22, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 22, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 22, 'minat_bidang_id' => 39],

            ['perusahaan_id' => 23, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 23, 'minat_bidang_id' => 15],
            ['perusahaan_id' => 23, 'minat_bidang_id' => 26],
            ['perusahaan_id' => 23, 'minat_bidang_id' => 74],

            ['perusahaan_id' => 24, 'minat_bidang_id' => 71],
            ['perusahaan_id' => 24, 'minat_bidang_id' => 59],
            ['perusahaan_id' => 24, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 24, 'minat_bidang_id' => 34],
            ['perusahaan_id' => 24, 'minat_bidang_id' => 26],
            
            ['perusahaan_id' => 25, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 25, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 25, 'minat_bidang_id' => 70],
            ['perusahaan_id' => 25, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 25, 'minat_bidang_id' => 33],
            ['perusahaan_id' => 25, 'minat_bidang_id' => 26],

            ['perusahaan_id' => 26, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 26, 'minat_bidang_id' => 75],
            ['perusahaan_id' => 26, 'minat_bidang_id' => 33],
            ['perusahaan_id' => 26, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 26, 'minat_bidang_id' => 3],
            ['perusahaan_id' => 26, 'minat_bidang_id' => 39],
            ['perusahaan_id' => 26, 'minat_bidang_id' => 72],
            ['perusahaan_id' => 26, 'minat_bidang_id' => 59],

            ['perusahaan_id' => 27, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 27, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 27, 'minat_bidang_id' => 19],
            ['perusahaan_id' => 27, 'minat_bidang_id' => 22],
            ['perusahaan_id' => 27, 'minat_bidang_id' => 39],

            ['perusahaan_id' => 28, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 28, 'minat_bidang_id' => 70],
            ['perusahaan_id' => 28, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 28, 'minat_bidang_id' => 7],
            ['perusahaan_id' => 28, 'minat_bidang_id' => 8],
            ['perusahaan_id' => 28, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 28, 'minat_bidang_id' => 19],
            ['perusahaan_id' => 28, 'minat_bidang_id' => 33],

            ['perusahaan_id' => 29, 'minat_bidang_id' => 26],
            ['perusahaan_id' => 29, 'minat_bidang_id' => 14],
            ['perusahaan_id' => 29, 'minat_bidang_id' => 15],
            ['perusahaan_id' => 29, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 29, 'minat_bidang_id' => 27],

            ['perusahaan_id' => 30, 'minat_bidang_id' => 5],
            ['perusahaan_id' => 30, 'minat_bidang_id' => 70],
            ['perusahaan_id' => 30, 'minat_bidang_id' => 1],
            ['perusahaan_id' => 30, 'minat_bidang_id' => 19],
            ['perusahaan_id' => 30, 'minat_bidang_id' => 20],
            ['perusahaan_id' => 30, 'minat_bidang_id' => 14],
            ['perusahaan_id' => 30, 'minat_bidang_id' => 15],
            ['perusahaan_id' => 30, 'minat_bidang_id' => 32],
            ['perusahaan_id' => 30, 'minat_bidang_id' => 39],


        ]);
    }
}
