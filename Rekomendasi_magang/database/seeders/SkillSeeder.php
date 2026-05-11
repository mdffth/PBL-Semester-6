<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            // Dasar & Logika
            ['name' => 'Pemrograman Dasar', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Logika Sistem', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kemampuan Analisis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Berpikir Sistematis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Problem Solving', 'created_at' => now(), 'updated_at' => now()],

            // Pengembangan Software & Sistem
            ['name' => 'System Integration', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Database Management', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Analisis Sistem', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Software Testing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Automation Testing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dokumentasi Teknis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'System Design', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Microservices Architecture', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Distributed Systems', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Object Oriented Programming', 'created_at' => now(), 'updated_at' => now()],

            // Data & AI
            ['name' => 'Data Processing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Visualization', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Machine Learning', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Engineering', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ETL Processing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Analisis Log', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Interpretasi Insight', 'created_at' => now(), 'updated_at' => now()],

            // Infrastruktur & Keamanan
            ['name' => 'Network Administration', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Server Management', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cloud Computing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Monitoring Keamanan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Information Security Compliance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IT Governance', 'created_at' => now(), 'updated_at' => now()],

            // Komunikasi & Bisnis
            ['name' => 'Komunikasi Teknis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Analisis Kebutuhan Bisnis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manajemen Data', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SEO Strategy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desain Grafis', 'created_at' => now(), 'updated_at' => now()],

            // Karakter & Kerja
            ['name' => 'Kerjasama Tim', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Disiplin Kerja', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kepemimpinan Proaktif', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan Arsitektur & Perancangan
            ['name' => 'Business Process Modelling', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Database Schema Design', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Technical Writing', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan Mobile & API
            ['name' => 'Mobile Application Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'API Architecture', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan Spasial & GIS
            ['name' => 'Spatial Data Analysis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Geospatial Visualization', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan Keamanan & Jaringan
            ['name' => 'Vulnerability Assessment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Network Security', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Encryption & Data Privacy', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan Manajemen & Metodologi
            ['name' => 'Version Control Strategy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Agile Methodology', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'System Maintenance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Analysis', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
