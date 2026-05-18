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
            ['name' => 'Visual Basic', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'VB.NET', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MySQL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PostgreSQL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SQL Server', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'FastAPI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Node.js', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Express', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'React.js', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Next.js', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vue', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'JavaScript', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Python', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TensorFlow', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PyTorch', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'LLM tools', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'REST API', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'GraphQL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Docker', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AWS', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'GCP', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CI/CD tools', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PostGIS', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'OpenLayers', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Leaflet', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hyperledger', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fabric', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grafana', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Prometheus', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ERP-BPM platform', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Power BI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Looker Studio', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tableau', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Google Analytics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pandas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Matplotlib', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Seaborn', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flutter', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dart', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Go', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Unity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'C#', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'GitHub', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Figma', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Adobe XD', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Canva', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Postman', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Playwright', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Selenium', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cypress', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'manual testing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'automation tools', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'n8n', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'WebSocket', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'API AI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'WordPress', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Instagram tools', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Microsoft Office', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Excel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Google Sheets', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IoT platform', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AI/ML framework', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Digital Twin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SIEM', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wazuh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Splunk', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ELK', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wireshark', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nmap', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'log analysis tools', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'firewall tools', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cisco', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mikrotik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Linux server', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Social Media Analytics Tools', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sistem manajemen hotel (PMS)', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Software hotel (PMS)', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
