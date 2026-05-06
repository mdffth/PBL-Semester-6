<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('technologies')->insert([
            // Frameworks
            ['name' => 'Laravel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'FastAPI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Express', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'React.js', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Next.js', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vue', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TensorFlow', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PyTorch', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flutter', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Playwright', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Selenium', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cypress', 'created_at' => now(), 'updated_at' => now()],

            // Aplikasi / Software / Tools
            ['name' => 'Power BI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Looker Studio', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tableau', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Google Analytics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'WordPress', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Figma', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Adobe XD', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Canva', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Postman', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'n8n', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Instagram tools', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Microsoft Office', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Excel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Google Sheets', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wazuh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Splunk', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wireshark', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nmap', 'created_at' => now(), 'updated_at' => now()],

            // Database & GIS Systems
            ['name' => 'MySQL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PostgreSQL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SQL Server', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PostGIS', 'created_at' => now(), 'updated_at' => now()],

            // Cloud, DevOps & Infrastructure
            ['name' => 'Docker', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AWS', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'GCP', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'GitHub', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Linux Server', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan untuk Blockchain Developer
            ['name' => 'Solidity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Truffle / Hardhat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Web3.js / Ethers.js', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan untuk IoT & Embedded Systems
            ['name' => 'Arduino IDE', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Raspberry Pi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ESP32 / ESP8266', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MQTT', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan untuk IT Governance & IT Audit
            ['name' => 'COBIT', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ITIL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ISO/IEC 27001', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan untuk Cyber Security & Web Security
            ['name' => 'Metasploit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Burp Suite', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kali Linux', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan untuk Network Engineer & Administrator Jaringan
            ['name' => 'Winbox', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'GNS3 / Cisco Packet Tracer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Zabbix', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan untuk System Analyst & Enterprise Architect
            ['name' => 'Enterprise Architect (Sparx)', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Visual Paradigm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trello / Jira', 'created_at' => now(), 'updated_at' => now()],

            // Tambahan untuk Game Developer
            ['name' => 'Unreal Engine', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blender', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
