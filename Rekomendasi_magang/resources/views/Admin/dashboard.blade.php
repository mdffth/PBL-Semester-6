@extends('layouts.perusahaan')

@section('topbar_title', 'Dashboard Admin')

@section('topbar_subtitle', 'Ringkasan data perusahaan mitra dan lowongan magang mahasiswa.')

@section('content')
                <!-- STATS -->
                <div class="stats">
                    {{-- TOTAL PERUSAHAAN --}}
                    <a href="{{ route('dashboard.index', request()->except('filter')) }}" class="stat-link">
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
                    <a href="{{ route('dashboard.index', array_merge(request()->query(), ['filter' => 'active'])) }}"
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
                    <a href="{{ route('dashboard.index', array_merge(request()->query(), ['filter' => 'nonactive'])) }}"
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
                        <div class="card-title">
                            Top 5 Minat Bidang
                        </div>            

                        <div class="dashboard-chart-container">
                            <canvas id="minatChart"></canvas>
                        </div>

                    </div>

                    <!-- PIE CHART -->
                    <div class="card">
                        <div class="card-title">
                            Perusahaan Berdasarkan Industri
                        </div> 

                        <div class="industry-chart">
                            <canvas id="industryChart"></canvas>
                        </div>

                    </div>

                </div>

                <!-- TABLE -->
                <div class="card table-card">
                        <div class="dashboard-chart-header">
                            <div class="card-title">
                                Perusahaan Terbaru
                            </div>            
                        </div>

                    <table id="companyTable">

                        <thead>

                            <tr>

                                <th>PROFILE</th>
                                <th>INDUSTRI</th>
                                <th>POSISI</th>
                                <th>PAID/UNPAID</th>
                                <th style="text-align:center" >DURASI</th>
                                <th>STATUS</th>
                                <th style="text-align:center" >AKSI</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($perusahaan as $item)

                                <tr>
                                    <td>
                                        <div class="company">
                                            <div>
                                                <strong>{{ $item->name }}</strong>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        {{ ($item->tipe_industri) }}
                                    </td>

                                    <td>
                                        <div class="posisi-wrapper">

                                            @php
                                                $bidang = $item->minatBidang->pluck('name')->toArray();
                                                $visible = array_slice($bidang, 0, 2);
                                                $remaining = count($bidang) - 2;
                                            @endphp

                                            {{-- untuk datatable search --}}
                                            <span style="display:none;">
                                                {{ implode(' ', $bidang) }}
                                            </span>

                                            @foreach($visible as $b)
                                                <span class="badge-posisi">
                                                    {{ $b }}
                                                </span>
                                            @endforeach

                                            @if($remaining > 0)
                                                <span class="badge-more">
                                                    +{{ $remaining }} lainnya
                                                </span>
                                            @endif

                                        </div>
                                    </td>
                                    
                                    <td style="text-align:center" >
                                        {{ ($item->benefit) }}
                                    </td>

                                    <td style="text-align:center" >
                                        {{ $item->duration_months }} bulan
                                    </td>

                                    <td>
                                        <label class="switch-toggle">

                                            <input
                                                type="checkbox"
                                                class="toggle-status"
                                                data-id="{{ $item->id }}"
                                                {{ $item->status_magang == 'Active' ? 'checked' : '' }}
                                            >

                                            <span class="switch-slider"></span>

                                        </label>
                                    </td>

                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('perusahaan.edit', [
                                                'id' => $item->id,
                                                'page' => request('page', 1)
                                            ]) }}"
                                            class="action-btn edit">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <form
                                                action="{{ route('perusahaan.destroy', $item->id) }}"
                                                method="POST"
                                                class="form-delete"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="action-btn delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>                                            
                                        </div>
                                    </td>                                    

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" style="text-align:center; padding:30px;">
                                        Data perusahaan belum tersedia
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>                   
                    </table>

                </div>
                
            </div>

        </main>

    </div>
    
    

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // =====================================
    // BAR CHART - TOP MINAT BIDANG
    // =====================================

    const minatChart = new Chart(
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

                onClick(event, elements) {

                    if (!elements.length) return;

                    const index = elements[0].index;
                    const bidang = this.data.labels[index];

                    const url = new URL(window.location.href);

                    url.searchParams.set('bidang', bidang);

                    window.location.href = url.toString();
                },

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

    const industryChart = new Chart(
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

                onClick(event, elements) {

                    if (!elements.length) return;

                    const index = elements[0].index;
                    const industri = this.data.labels[index];

                    const url = new URL(window.location.href);

                    url.searchParams.set('industri', industri);

                    window.location.href = url.toString();
                },

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


// =====================================
// TOGGLE STATUS
// =====================================

document.querySelectorAll('.toggle-status').forEach(toggle => {

    toggle.addEventListener('change', function () {

        let id = this.dataset.id;

        fetch(`/admin/perusahaan/toggle_status/${id}`, {

            method: 'POST',

            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }

        })

        .then(response => response.json())

        .then(data => {

            location.reload();

        })

        .catch(error => {

            console.log(error);

        });

    });

});
</script>

@endsection