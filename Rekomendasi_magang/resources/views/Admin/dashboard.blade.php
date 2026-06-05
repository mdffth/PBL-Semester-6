@extends('layouts.perusahaan')

@section('topbar_title', 'Dashboard Admin')

@section('content')
                <!-- PAGE HEADER -->

                <div class="page-header">

                    <div>
                        <div class="page-title">
                            Dashboard Overview
                        </div>
                        <div class="page-subtitle">
                            Kelola data perusahaan mitra dan lowongan magang mahasiswa.
                        </div>
                    </div>

                </div>

                <!-- STATS -->
                <div class="stats">
                    {{-- TOTAL PERUSAHAAN --}}
                    <a href="{{ route('dashboard.index') }}" class="stat-link">
                        <div class="card stat-card {{ request('filter') == null ? 'active-card' : '' }}">
                            <div class="stat-header">
                                <div class="stat-icon blue">
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <div>
                                    <div class="stat-label">
                                        TOTAL PERUSAHAAN
                                    </div>
                                </div>
                            </div>
                            <div class="stat-footer">
                                <div class="stat-number">
                                    {{ $totalPerusahaan }}
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- LOWONGAN AKTIF --}}
                    <a href="{{ route('dashboard.index', ['filter' => 'active']) }}"
                    class="stat-link">
                        <div class="card stat-card {{ request('filter') == 'active' ? 'active-card' : '' }}">
                            <div class="stat-header">
                                <div class="stat-icon green">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <div>
                                    <div class="stat-label">
                                        LOWONGAN AKTIF
                                    </div>
                                </div>
                            </div>
                            <div class="stat-footer">
                                <div class="stat-number">
                                    {{ $lowonganAktif }}
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- LOWONGAN TUTUP --}}
                    <a href="{{ route('dashboard.index', ['filter' => 'nonactive']) }}"
                    class="stat-link">
                        <div class="card stat-card {{ request('filter') == 'nonactive' ? 'active-card' : '' }}">
                            <div class="stat-header">
                                <div class="stat-icon red">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <div>
                                    <div class="stat-label">
                                        LOWONGAN TUTUP
                                    </div>
                                </div>
                            </div>
                            <div class="stat-footer">
                                <div class="stat-number">
                                    {{ $lowonganTutup }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- BAR CHART -->
                <div class="chart-grid">

                    <div class="card">

                        <div class="dashboard-chart-header">
                            <div class="table-title">
                                Top 5 Minat Bidang
                            </div>            
                            {{-- <h3>Top 5 Minat Bidang</h3> --}}
                        </div>

                        <div class="dashboard-chart-body">
                            <div class="dashboard-chart-container">
                                <canvas id="minatChart"></canvas>
                            </div>
                        </div>

                    </div>

                    <!-- PIE CHART -->
                    <div class="card">

                        <div class="dashboard-chart-header">
                            <div class="table-title">
                                Perusahaan Berdasarkan Industri
                            </div> 
                        </div>

                        <div class="dashboard-chart-body">

                            <div class="industry-wrapper">

                                <div class="industry-chart">
                                    <canvas id="industryChart"></canvas>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- TABLE -->

                

            </div>

        </main>

    </div>
    
    

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // =====================================
    // BAR CHART - TOP MINAT BIDANG
    // =====================================

    new Chart(
        document.getElementById('minatChart'),
        {
            type: 'bar',

            data: {
                labels: @json($labels),

                datasets: [{
                    data: @json($data),

                    backgroundColor: [
                        '#4F46E5',
                        '#06B6D4',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444'
                    ],

                }]
            },

options: {
    responsive: true,
    maintainAspectRatio: false,

    plugins: {
        legend: {
            display: false
        }
    },

    scales: {
        x: {
            grid: {
                display: false
            },

            ticks: {
                maxRotation: 0,
                minRotation: 0,
                padding: 10,

                font: {
                    size: 11
                },

                callback: function(value) {

                    const label =
                        this.getLabelForValue(value);

                    const words =
                        label.split(' ');

                    let lines = [];
                    let currentLine = '';

                    words.forEach(word => {

                        if (
                            (currentLine + ' ' + word)
                                .length > 15
                        ) {
                            lines.push(currentLine);
                            currentLine = word;
                        } else {
                            currentLine +=
                                (currentLine ? ' ' : '') + word;
                        }

                    });

                    lines.push(currentLine);

                    return lines;
                }
            }
        },

        y: {
            beginAtZero: true,

            ticks: {
                stepSize: 2
            }
        }
    }
}
        }
    );


    // =====================================
    // DOUGHNUT CHART - INDUSTRI
    // =====================================

    new Chart(
        document.getElementById('industryChart'),
        {
            type: 'doughnut',

            data: {
                labels: @json($industriLabels),

                datasets: [{
                    data: @json($industriData),

                    backgroundColor: [
                        '#4F46E5',
                        '#06B6D4',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444'
                    ],

                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                cutout: '55%',

                plugins: {
                    legend: {
                        position: 'right',

                        labels: {
                            boxWidth: 12,
                            boxHeight: 12,
                            padding: 15,

                            font: {
                                size: 11
                            }
                        }
                    }
                }
            }
        }
    );

});
</script>

@endsection