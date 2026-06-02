<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class perusahaan_skillpvtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perusahaan_skills')->insert([
            ['perusahaan_id' => 1, 'skill_id' => 1],
            ['perusahaan_id' => 1, 'skill_id' => 2],
            ['perusahaan_id' => 1, 'skill_id' => 3],
            ['perusahaan_id' => 1, 'skill_id' => 34],
            ['perusahaan_id' => 1, 'skill_id' => 35],

            ['perusahaan_id' => 2, 'skill_id' => 7],
            ['perusahaan_id' => 2, 'skill_id' => 6],
            ['perusahaan_id' => 2, 'skill_id' => 1],
            ['perusahaan_id' => 2, 'skill_id' => 33],
            ['perusahaan_id' => 2, 'skill_id' => 8],
            ['perusahaan_id' => 2, 'skill_id' => 16],
            ['perusahaan_id' => 2, 'skill_id' => 9],
            ['perusahaan_id' => 2, 'skill_id' => 11],
            ['perusahaan_id' => 2, 'skill_id' => 34],
            ['perusahaan_id' => 2, 'skill_id' => 35],

            ['perusahaan_id' => 3, 'skill_id' => 20],
            ['perusahaan_id' => 3, 'skill_id' => 7],
            ['perusahaan_id' => 3, 'skill_id' => 1],
            ['perusahaan_id' => 3, 'skill_id' => 6],
            ['perusahaan_id' => 3, 'skill_id' => 17],
            ['perusahaan_id' => 3, 'skill_id' => 18],
            ['perusahaan_id' => 3, 'skill_id' => 16],
            ['perusahaan_id' => 3, 'skill_id' => 25],
            ['perusahaan_id' => 3, 'skill_id' => 34],
            ['perusahaan_id' => 3, 'skill_id' => 35],

            ['perusahaan_id' => 4, 'skill_id' => 14],
            ['perusahaan_id' => 4, 'skill_id' => 41],
            ['perusahaan_id' => 4, 'skill_id' => 6],
            ['perusahaan_id' => 4, 'skill_id' => 13],
            ['perusahaan_id' => 4, 'skill_id' => 19],
            ['perusahaan_id' => 4, 'skill_id' => 21],
            ['perusahaan_id' => 4, 'skill_id' => 1],
            ['perusahaan_id' => 4, 'skill_id' => 17],
            ['perusahaan_id' => 4, 'skill_id' => 18],
            ['perusahaan_id' => 4, 'skill_id' => 16],
            ['perusahaan_id' => 4, 'skill_id' => 25],
            ['perusahaan_id' => 4, 'skill_id' => 49],
            ['perusahaan_id' => 4, 'skill_id' => 35],

            ['perusahaan_id' => 5, 'skill_id' => 20],
            ['perusahaan_id' => 5, 'skill_id' => 42],
            ['perusahaan_id' => 5, 'skill_id' => 43],
            ['perusahaan_id' => 5, 'skill_id' => 1],
            ['perusahaan_id' => 5, 'skill_id' => 6],
            ['perusahaan_id' => 5, 'skill_id' => 18],
            ['perusahaan_id' => 5, 'skill_id' => 16],
            ['perusahaan_id' => 5, 'skill_id' => 25],
            ['perusahaan_id' => 5, 'skill_id' => 49],
            ['perusahaan_id' => 5, 'skill_id' => 34],


            ['perusahaan_id' => 6, 'skill_id' => 1],
            ['perusahaan_id' => 6, 'skill_id' => 12],
            ['perusahaan_id' => 6, 'skill_id' => 40],
            ['perusahaan_id' => 6, 'skill_id' => 50],
            ['perusahaan_id' => 6, 'skill_id' => 30],
            ['perusahaan_id' => 6, 'skill_id' => 37],
            ['perusahaan_id' => 6, 'skill_id' => 28],
            ['perusahaan_id' => 6, 'skill_id' => 27],
            ['perusahaan_id' => 6, 'skill_id' => 23],
            ['perusahaan_id' => 6, 'skill_id' => 24],
            ['perusahaan_id' => 6, 'skill_id' => 25],
            ['perusahaan_id' => 6, 'skill_id' => 34],


            // Frontend (HTML/CSS/JS/React)
            ['perusahaan_id' => 7, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 7, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 7, 'skill_id' => 42], // Asynchronous Programming (Berdasarkan list gambar ID 42)
            // QA
            ['perusahaan_id' => 7, 'skill_id' => 9],  // Software Testing
            ['perusahaan_id' => 7, 'skill_id' => 10], // Automation Testing
            // AI (Python/ML)
            ['perusahaan_id' => 7, 'skill_id' => 18], // Machine Learning
            ['perusahaan_id' => 7, 'skill_id' => 16], // Data Processing
            // DevOps (Docker/CICD/Cloud)
            ['perusahaan_id' => 7, 'skill_id' => 25], // Cloud Computing
            ['perusahaan_id' => 7, 'skill_id' => 49], // System Maintenance (Mewakili CI/CD/Docker)
            ['perusahaan_id' => 7, 'skill_id' => 47], // Version Control Strategy

            ['perusahaan_id' => 8, 'skill_id' => 40], // Mobile Application Development (Mewakili Flutter/Dart)
            ['perusahaan_id' => 8, 'skill_id' => 1],  // Pemrograman Dasar (Mewakili Backend Dev/Logic)
            ['perusahaan_id' => 8, 'skill_id' => 6],  // System Integration (Mewakili REST API)
            ['perusahaan_id' => 8, 'skill_id' => 10], // Automation Testing
            ['perusahaan_id' => 8, 'skill_id' => 5],  // Problem Solving (Mewakili Pemecahan Masalah)
            ['perusahaan_id' => 8, 'skill_id' => 41], // API Architecture (Tambahan untuk REST API)

            // Pemrograman dasar (Flutter/web)
            ['perusahaan_id' => 9, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 9, 'skill_id' => 40], // Mobile Application Development
            // API
            ['perusahaan_id' => 9, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 9, 'skill_id' => 41], // API Architecture
            // Database
            ['perusahaan_id' => 9, 'skill_id' => 7],  // Database Management
            ['perusahaan_id' => 9, 'skill_id' => 38], // Database Schema Design
            // Software testing
            ['perusahaan_id' => 9, 'skill_id' => 9],  // Software Testing
            // Dokumentasi
            ['perusahaan_id' => 9, 'skill_id' => 11], // Dokumentasi Teknis
            ['perusahaan_id' => 9, 'skill_id' => 39], // Technical Writing

            // Game Programmer (C#, Unity, OOP, Git)
            ['perusahaan_id' => 10, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 10, 'skill_id' => 15], // Object Oriented Programming
            ['perusahaan_id' => 10, 'skill_id' => 47], // Version Control Strategy (Mewakili Git)
            // Fullstack (Flutter/React, Laravel, API, Database)
            ['perusahaan_id' => 10, 'skill_id' => 40], // Mobile Application Development (Flutter)
            ['perusahaan_id' => 10, 'skill_id' => 6],  // System Integration (REST API)
            ['perusahaan_id' => 10, 'skill_id' => 7],  // Database Management
            ['perusahaan_id' => 10, 'skill_id' => 38], // Database Schema Design (Relasional)
            // Frontend (HTML/CSS/JS, React/Next.js, UI/UX, Figma)
            ['perusahaan_id' => 10, 'skill_id' => 17], // Data Visualization (Mewakili UI/UX)
            ['perusahaan_id' => 10, 'skill_id' => 33], // Desain Grafis (Mewakili Figma/Visual)
            ['perusahaan_id' => 10, 'skill_id' => 42], // Asynchronous Programming (Kebutuhan React/Next.js)

            // Analisis data
            ['perusahaan_id' => 11, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 11, 'skill_id' => 16], // Data Processing
            ['perusahaan_id' => 11, 'skill_id' => 50], // Data Processing
            // Visualisasi data
            ['perusahaan_id' => 11, 'skill_id' => 17], // Data Visualization
            // SQL
            ['perusahaan_id' => 11, 'skill_id' => 7],  // Database Management
            // Python/R
            ['perusahaan_id' => 11, 'skill_id' => 1],  // Pemrograman Dasar
            // Interpretasi insight digital
            ['perusahaan_id' => 11, 'skill_id' => 22], // Interpretasi Insight

            // Fullstack development
            ['perusahaan_id' => 12, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 12, 'skill_id' => 12], // System Design
            // REST API & WebSocket
            ['perusahaan_id' => 12, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 12, 'skill_id' => 41], // API Architecture
            ['perusahaan_id' => 12, 'skill_id' => 42], // Asynchronous Programming (Mewakili WebSocket/Real-time)
            // Pemahaman dasar AI/chatbot
            ['perusahaan_id' => 12, 'skill_id' => 18], // Machine Learning
            ['perusahaan_id' => 12, 'skill_id' => 16], // Data Processing
            // Integrasi automation tools
            ['perusahaan_id' => 12, 'skill_id' => 10], // Automation Testing
            ['perusahaan_id' => 12, 'skill_id' => 49], // System Maintenance (Mewakili Automation Workflow)

            // Berpikir sistematis dan analitis
            ['perusahaan_id' => 13, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 13, 'skill_id' => 4],  // Berpikir Sistematis
            // Problem solving berbasis data
            ['perusahaan_id' => 13, 'skill_id' => 5],  // Problem Solving
            ['perusahaan_id' => 13, 'skill_id' => 16], // Data Processing (Dasar analisis berbasis data)
            // Pemahaman kebutuhan bisnis
            ['perusahaan_id' => 13, 'skill_id' => 30], // Analisis Kebutuhan Bisnis
            ['perusahaan_id' => 13, 'skill_id' => 37], // Business Process Modelling
            // Efisiensi & skalabilitas sistem
            ['perusahaan_id' => 13, 'skill_id' => 12], // System Design
            ['perusahaan_id' => 13, 'skill_id' => 13], // Microservices Architecture (Mewakili Skalabilitas)
            ['perusahaan_id' => 13, 'skill_id' => 49], // System Maintenance (Mewakili Efisiensi Operasional)

            // Komunikasi baik & Grooming (Penampilan/Profesionalisme)
            ['perusahaan_id' => 14, 'skill_id' => 29], // Komunikasi Teknis (Mewakili kemampuan komunikasi)
            // Proaktif
            ['perusahaan_id' => 14, 'skill_id' => 36], // Kepemimpinan Proaktif
            // Detail & Disiplin
            ['perusahaan_id' => 14, 'skill_id' => 35], // Disiplin Kerja
            ['perusahaan_id' => 14, 'skill_id' => 11], // Dokumentasi Teknis (Mewakili ketelitian/detail)
            // Mampu bekerja tim maupun mandiri
            ['perusahaan_id' => 14, 'skill_id' => 34], // Kerjasama Tim

            // Web development (modifikasi sistem)
            ['perusahaan_id' => 15, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 15, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 15, 'skill_id' => 49], // System Maintenance (Mewakili modifikasi/pemeliharaan)
            // Manajemen data & SQL
            ['perusahaan_id' => 15, 'skill_id' => 7],  // Database Management
            ['perusahaan_id' => 15, 'skill_id' => 31], // Manajemen Data
            // Analisis data
            ['perusahaan_id' => 15, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 15, 'skill_id' => 16], // Data Processing
            // Dokumentasi
            ['perusahaan_id' => 15, 'skill_id' => 11], // Dokumentasi Teknis
            ['perusahaan_id' => 15, 'skill_id' => 39], // Technical Writing

            // Frontend/Backend/UI-UX
            ['perusahaan_id' => 16, 'skill_id' => 1],  // Pemrograman Dasar (Mewakili Frontend/Backend)
            ['perusahaan_id' => 16, 'skill_id' => 12], // System Design (Mewakili Arsitektur Fullstack)
            ['perusahaan_id' => 16, 'skill_id' => 17], // Data Visualization (Mewakili UI-UX)
            ['perusahaan_id' => 16, 'skill_id' => 33], // Desain Grafis (Mewakili Visual UI)
            // Perancangan database & Normalisasi
            ['perusahaan_id' => 16, 'skill_id' => 7],  // Database Management
            ['perusahaan_id' => 16, 'skill_id' => 38], // Database Schema Design (Mewakili Perancangan/Normalisasi)
            // REST API
            ['perusahaan_id' => 16, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 16, 'skill_id' => 41], // API Architecture
            // Kemampuan kerja tim
            ['perusahaan_id' => 16, 'skill_id' => 34], // Kerjasama Tim

            // Pemrograman
            ['perusahaan_id' => 17, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 17, 'skill_id' => 15], // Object Oriented Programming
            // Analisis Data
            ['perusahaan_id' => 17, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 17, 'skill_id' => 16], // Data Processing
            ['perusahaan_id' => 17, 'skill_id' => 22], // Interpretasi Insight
            ['perusahaan_id' => 17, 'skill_id' => 50], // Interpretasi Insight
            // Dasar AI/ML
            ['perusahaan_id' => 17, 'skill_id' => 18], // Machine Learning
            // Problem Solving
            ['perusahaan_id' => 17, 'skill_id' => 5],  // Problem Solving
            ['perusahaan_id' => 17, 'skill_id' => 2],  // Logika Sistem
            // Komunikasi dalam tim
            ['perusahaan_id' => 17, 'skill_id' => 29], // Komunikasi Teknis
            ['perusahaan_id' => 17, 'skill_id' => 34], // Kerjasama Tim

            // Kompetensi sesuai jurusan (IT/Engineering)
            ['perusahaan_id' => 18, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 18, 'skill_id' => 2],  // Logika Sistem
            ['perusahaan_id' => 18, 'skill_id' => 12], // System Design
            ['perusahaan_id' => 18, 'skill_id' => 15], // Object Oriented Programming
            // Komunikasi
            ['perusahaan_id' => 18, 'skill_id' => 29], // Komunikasi Teknis
            // Disiplin
            ['perusahaan_id' => 18, 'skill_id' => 35], // Disiplin Kerja
            // Kerja tim
            ['perusahaan_id' => 18, 'skill_id' => 34], // Kerjasama Tim

            // Web development
            ['perusahaan_id' => 19, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 19, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 19, 'skill_id' => 12], // System Design
            // Desain grafis/visual & Pembuatan konten digital
            ['perusahaan_id' => 19, 'skill_id' => 33], // Desain Grafis
            ['perusahaan_id' => 19, 'skill_id' => 17], // Data Visualization (Mewakili aspek visual konten)
            // SEO dasar
            ['perusahaan_id' => 19, 'skill_id' => 32], // SEO Strategy
            // Komunikasi
            ['perusahaan_id' => 19, 'skill_id' => 29], // Komunikasi Teknis
            ['perusahaan_id' => 19, 'skill_id' => 39], // Technical Writing (Relevan untuk konten & SEO)

            // Laravel, JavaScript, Node.js
            ['perusahaan_id' => 20, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 20, 'skill_id' => 15], // Object Oriented Programming (Kebutuhan Laravel/Node)
            ['perusahaan_id' => 20, 'skill_id' => 42], // Asynchronous Programming (Kebutuhan Node.js/JS)
            // MySQL & SQL Server (Bonus)
            ['perusahaan_id' => 20, 'skill_id' => 7],  // Database Management
            ['perusahaan_id' => 20, 'skill_id' => 31], // Manajemen Data
            // REST API
            ['perusahaan_id' => 20, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 20, 'skill_id' => 41], // API Architecture
            // Git
            ['perusahaan_id' => 20, 'skill_id' => 47], // Version Control Strategy
            // System Design & ERD
            ['perusahaan_id' => 20, 'skill_id' => 12], // System Design
            ['perusahaan_id' => 20, 'skill_id' => 38], // Database Schema Design (Mewakili ERD)

            // SOC (Monitoring Keamanan, Analisis Log, SIEM, Networking)
            ['perusahaan_id' => 21, 'skill_id' => 26], // Monitoring Keamanan
            ['perusahaan_id' => 21, 'skill_id' => 21], // Analisis Log
            ['perusahaan_id' => 21, 'skill_id' => 23], // Network Administration (Mewakili Networking)
            ['perusahaan_id' => 21, 'skill_id' => 45], // Network Security
            // Compliance (Regulasi Keamanan Informasi, Dokumentasi, Analisis)
            ['perusahaan_id' => 21, 'skill_id' => 27], // Information Security Compliance
            ['perusahaan_id' => 21, 'skill_id' => 28], // IT Governance
            ['perusahaan_id' => 21, 'skill_id' => 11], // Dokumentasi Teknis
            ['perusahaan_id' => 21, 'skill_id' => 3],  // Kemampuan Analisis

            // Keamanan informasi (IT Governance)
            ['perusahaan_id' => 22, 'skill_id' => 28], // IT Governance
            ['perusahaan_id' => 22, 'skill_id' => 27], // Information Security Compliance
            ['perusahaan_id' => 22, 'skill_id' => 26], // Monitoring Keamanan
            // Jaringan & Server (Infrastruktur TI)
            ['perusahaan_id' => 22, 'skill_id' => 23], // Network Administration
            ['perusahaan_id' => 22, 'skill_id' => 24], // Server Management
            ['perusahaan_id' => 22, 'skill_id' => 45], // Network Security
            // Pemrograman
            ['perusahaan_id' => 22, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 22, 'skill_id' => 15], // Object Oriented Programming
            // Pengujian aplikasi (App Dev)
            ['perusahaan_id' => 22, 'skill_id' => 9],  // Software Testing
            ['perusahaan_id' => 22, 'skill_id' => 44], // Vulnerability Assessment (Mewakili pengujian keamanan aplikasi)

            // Laravel, Python (Pemrograman)
            ['perusahaan_id' => 23, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 23, 'skill_id' => 15], // Object Oriented Programming
            // Looker Studio, Excel, Analisis Data
            ['perusahaan_id' => 23, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 23, 'skill_id' => 16], // Data Processing
            ['perusahaan_id' => 23, 'skill_id' => 17], // Data Visualization
            ['perusahaan_id' => 23, 'skill_id' => 31], // Manajemen Data
            // AI/ML
            ['perusahaan_id' => 23, 'skill_id' => 18], // Machine Learning
            // IoT & Digital Twin
            ['perusahaan_id' => 23, 'skill_id' => 6],  // System Integration (Koneksi IoT ke Sistem)
            ['perusahaan_id' => 23, 'skill_id' => 12], // System Design (Arsitektur Digital Twin)
            ['perusahaan_id' => 23, 'skill_id' => 43], // Geospatial Visualization (Sering relevan dengan Digital Twin)

            // Software development/maintenance
            ['perusahaan_id' => 24, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 24, 'skill_id' => 49], // System Maintenance
            // Networking
            ['perusahaan_id' => 24, 'skill_id' => 23], // Network Administration
            ['perusahaan_id' => 24, 'skill_id' => 45], // Network Security
            // Analisis data
            ['perusahaan_id' => 24, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 24, 'skill_id' => 16], // Data Processing
            // Pemecahan masalah teknis IT
            ['perusahaan_id' => 24, 'skill_id' => 5],  // Problem Solving
            ['perusahaan_id' => 24, 'skill_id' => 2],  // Logika Sistem

            // Web development (frontend & backend)
            ['perusahaan_id' => 25, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 25, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 25, 'skill_id' => 12], // System Design
            ['perusahaan_id' => 25, 'skill_id' => 15], // Object Oriented Programming
            // Software testing
            ['perusahaan_id' => 25, 'skill_id' => 9],  // Software Testing
            ['perusahaan_id' => 25, 'skill_id' => 10], // Automation Testing
            // Analisis sistem
            ['perusahaan_id' => 25, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 25, 'skill_id' => 8],  // Analisis Sistem
            ['perusahaan_id' => 25, 'skill_id' => 4],  // Berpikir Sistematis
            // Komunikasi tim
            ['perusahaan_id' => 25, 'skill_id' => 29], // Komunikasi Teknis
            ['perusahaan_id' => 25, 'skill_id' => 34], // Kerjasama Tim

            // Fullstack & Backend (PHP, Ruby, React, REST/GraphQL)
            ['perusahaan_id' => 26, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 26, 'skill_id' => 6],  // System Integration (API REST/GraphQL)
            ['perusahaan_id' => 26, 'skill_id' => 15], // Object Oriented Programming (Standar PHP/Ruby)
            ['perusahaan_id' => 26, 'skill_id' => 41], // API Architecture
            ['perusahaan_id' => 26, 'skill_id' => 42], // Asynchronous Programming (Kebutuhan React)
            // System Analyst (SA) & Dokumentasi
            ['perusahaan_id' => 26, 'skill_id' => 8],  // Analisis Sistem
            ['perusahaan_id' => 26, 'skill_id' => 11], // Dokumentasi Teknis
            ['perusahaan_id' => 26, 'skill_id' => 39], // Technical Writing
            // Infrastruktur (Networking, OS, Security, ISO)
            ['perusahaan_id' => 26, 'skill_id' => 23], // Network Administration
            ['perusahaan_id' => 26, 'skill_id' => 24], // Server Management (Mewakili OS/Infrastruktur)
            ['perusahaan_id' => 26, 'skill_id' => 27], // Information Security Compliance (Mewakili ISO)
            ['perusahaan_id' => 26, 'skill_id' => 45], // Network Security
            // Data Center (DC) (Hardware, Cabling)
            ['perusahaan_id' => 26, 'skill_id' => 49], // System Maintenance (Mewakili pemeliharaan fisik/hardware)

            // Web development (frontend & backend)
            ['perusahaan_id' => 27, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 27, 'skill_id' => 12], // System Design
            ['perusahaan_id' => 27, 'skill_id' => 15], // Object Oriented Programming
            // Analisis kebutuhan
            ['perusahaan_id' => 27, 'skill_id' => 30], // Analisis Kebutuhan Bisnis
            ['perusahaan_id' => 27, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 27, 'skill_id' => 4],  // Berpikir Sistematis
            // Database
            ['perusahaan_id' => 27, 'skill_id' => 7],  // Database Management
            ['perusahaan_id' => 27, 'skill_id' => 38], // Database Schema Design
            // REST API
            ['perusahaan_id' => 27, 'skill_id' => 6],  // System Integration
            ['perusahaan_id' => 27, 'skill_id' => 41], // API Architecture
            // Testing
            ['perusahaan_id' => 27, 'skill_id' => 9],  // Software Testing
            ['perusahaan_id' => 27, 'skill_id' => 10], // Automation Testing

            // Backend (REST API, Database)
            ['perusahaan_id' => 28, 'skill_id' => 6],  // System Integration (REST API)
            ['perusahaan_id' => 28, 'skill_id' => 41], // API Architecture
            ['perusahaan_id' => 28, 'skill_id' => 7],  // Database Management
            ['perusahaan_id' => 28, 'skill_id' => 38], // Database Schema Design
            // Frontend (JavaScript, Framework Modern)
            ['perusahaan_id' => 28, 'skill_id' => 1],  // Pemrograman Dasar (JavaScript)
            ['perusahaan_id' => 28, 'skill_id' => 42], // Asynchronous Programming (Kebutuhan Framework Modern)
            // Fullstack (Frontend + Backend)
            ['perusahaan_id' => 28, 'skill_id' => 12], // System Design
            ['perusahaan_id' => 28, 'skill_id' => 15], // Object Oriented Programming
            // AI (Python, ML)
            ['perusahaan_id' => 28, 'skill_id' => 18], // Machine Learning
            ['perusahaan_id' => 28, 'skill_id' => 16], // Data Processing
            // System Analyst (SA) (Analisis Sistem)
            ['perusahaan_id' => 28, 'skill_id' => 8],  // Analisis Sistem
            ['perusahaan_id' => 28, 'skill_id' => 4],  // Berpikir Sistematis
            // UI/UX (Figma, Desain)
            ['perusahaan_id' => 28, 'skill_id' => 33], // Desain Grafis (Mewakili Figma)
            ['perusahaan_id' => 28, 'skill_id' => 17], // Data Visualization (Aspek antarmuka)

            // Analisis data
            ['perusahaan_id' => 29, 'skill_id' => 3],  // Kemampuan Analisis
            ['perusahaan_id' => 29, 'skill_id' => 16], // Data Processing
            ['perusahaan_id' => 29, 'skill_id' => 22], // Interpretasi Insight
            ['perusahaan_id' => 29, 'skill_id' => 50], // Interpretasi Insight
            // Administrasi sistem
            ['perusahaan_id' => 29, 'skill_id' => 24], // Server Management (Mewakili Administrasi Sistem)
            ['perusahaan_id' => 29, 'skill_id' => 49], // System Maintenance
            // Visualisasi data
            ['perusahaan_id' => 29, 'skill_id' => 17], // Data Visualization
            // SQL
            ['perusahaan_id' => 29, 'skill_id' => 7],  // Database Management
            ['perusahaan_id' => 29, 'skill_id' => 31], // Manajemen Data
            // Komunikasi
            ['perusahaan_id' => 29, 'skill_id' => 29], // Komunikasi Teknis

            // Backend/Frontend (RESTful API, Git, Logika Pemrograman)
            ['perusahaan_id' => 30, 'skill_id' => 1],  // Pemrograman Dasar
            ['perusahaan_id' => 30, 'skill_id' => 2],  // Logika Sistem (Mewakili Logika Pemrograman)
            ['perusahaan_id' => 30, 'skill_id' => 6],  // System Integration (RESTful API)
            ['perusahaan_id' => 30, 'skill_id' => 47], // Version Control Strategy (Mewakili Git)
            // UI/UX (Figma/Adobe XD, Portofolio Desain)
            ['perusahaan_id' => 30, 'skill_id' => 33], // Desain Grafis (Mewakili Figma/Adobe XD)
            ['perusahaan_id' => 30, 'skill_id' => 17], // Data Visualization (Aspek fungsional antarmuka)
            // Data Analyst (SQL, Python, Visualisasi)
            ['perusahaan_id' => 30, 'skill_id' => 7],  // Database Management (SQL)
            ['perusahaan_id' => 30, 'skill_id' => 16], // Data Processing (Python/Analisis teknis)
            ['perusahaan_id' => 30, 'skill_id' => 22], // Interpretasi Insight
            ['perusahaan_id' => 30, 'skill_id' => 50], // Interpretasi Insight
            // System Analyst (SA) (UML, Dokumentasi Teknis)
            ['perusahaan_id' => 30, 'skill_id' => 8],  // Analisis Sistem
            ['perusahaan_id' => 30, 'skill_id' => 12], // System Design (Mewakili perancangan UML)
            ['perusahaan_id' => 30, 'skill_id' => 11], // Dokumentasi Teknis
        ]);
    }
}
