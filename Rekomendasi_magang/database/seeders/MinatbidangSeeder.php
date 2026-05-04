<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinatbidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('minat_bidang')->insert([
            ['name' => 'Administrator Jaringan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Artificial Intelligence (AI) Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Automation Tester', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Back End Programmer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blockchain Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Business Intelligence (BI) Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cloud Architect', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cloud Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cyber Security', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Analyst', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Scientist', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Database Administrator', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Database Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desktop Programmer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'DevOps Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'DevSecOps Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Embedded Systems Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Front End Programmer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Full Stack Web Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Game Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Internet of Things (IoT)', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IT Governance / IT Audit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Machine Learning Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobile Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Network Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Quality Assurance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'System Analyst', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Systems Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'UI/UX Designer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Web Security Specialist', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
