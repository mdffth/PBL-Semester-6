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
                    <div class="card stat-card">
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

                    <div class="card stat-card">
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

                    <div class="card stat-card">
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

                </div>

                <!-- TABLE -->

                <div class="card table-card">

                    <div class="table-header">

                        <div class="table-title">
                            Daftar Perusahaan
                        </div>

                        <input type="text"
                            id="searchInput"
                            class="search-box"
                            placeholder="Cari perusahaan, status, posisi, bidang...">

                    </div>

                    <table id="companyTable">

                        <thead>

                            <tr>

                                <th>PROFILE</th>
                                <th>INDUSTRI</th>
                                <th>POSISI</th>
                                <th style="text-align:center" >DURASI</th>
                                <th style="text-align:center" >TIPE</th>
                                <th>STATUS</th>
                                <th style="text-align:center" >AKSI</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($perusahaan as $item)

                                <tr>

                                    <td>
                                        <div class="company">
                                            <div class="company-logo">
                                                {{ strtoupper(substr($item->nama_perusahaan, 0, 1)) }}
                                            </div>
                                            <div>
                                                <strong>{{ $item->name }}</strong>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge badge-blue">
                                            {{ strtoupper($item->bidang_industri) }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $item->posisi_magang }}
                                    </td>

                                    <td style="text-align:center" >
                                        {{ $item->duration_months }} bulan
                                    </td>

                                    <td style="text-align:center" >
                                        @if($item->status_magang == 'Paid')
                                            <span class="badge badge-green">
                                                PAID
                                            </span>
                                        @else
                                            <span class="badge badge-yellow">
                                                UNPAID
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('dashboard.toggle_status', $item->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                style="border:none; background:none; padding:0; cursor:pointer;">
                                                <div class="switch {{ $item->status_magang == 'Unpaid' ? 'off' : '' }}"></div>
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn edit">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button class="action-btn delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
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

                    <!-- PAGINATION -->
                    <div class="pagination-wrapper">

                        <div class="pagination-info">
                            Showing {{ $perusahaan->firstItem() }}
                            to {{ $perusahaan->lastItem() }}
                            of {{ $perusahaan->total() }} results
                        </div>

                        <div class="pagination-buttons">

                            {{-- Previous --}}
                            @if ($perusahaan->onFirstPage())

                                <span class="page-btn disabled">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </span>

                            @else

                                <a href="{{ $perusahaan->previousPageUrl() }}" class="page-btn">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>

                            @endif

                            {{-- Number --}}
                            @for ($i = 1; $i <= $perusahaan->lastPage(); $i++)

                                <a href="{{ $perusahaan->url($i) }}"
                                class="page-btn {{ $perusahaan->currentPage() == $i ? 'active' : '' }}">
                                    {{ $i }}
                                </a>

                            @endfor

                            {{-- Next --}}
                            @if ($perusahaan->hasMorePages())

                                <a href="{{ $perusahaan->nextPageUrl() }}" class="page-btn">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>

                            @else

                                <span class="page-btn disabled">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>
    
    <script>
    document.getElementById('searchInput').addEventListener('keyup', function () {

        let value = this.value.toLowerCase().trim();

        let rows = document.querySelectorAll('#companyTable tbody tr');

        rows.forEach(row => {

            let text = row.innerText.toLowerCase();

            let words = text.split(/\s+/);

            if (words.includes(value) || value === '') {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });

    });
    </script>

@endsection
{{-- </body> --}}
{{-- </html> --}}