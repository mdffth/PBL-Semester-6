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

    {{-- BUTTON LOGOUT --}}
    <div>

        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button type="submit"
                    style="
                        background:#dc2626;
                        color:white;
                        border:none;
                        padding:12px 18px;
                        border-radius:10px;
                        cursor:pointer;
                        font-weight:600;
                    ">

                Logout

            </button>

        </form>

    </div>

</div>


<!-- STATS -->
<div class="stats">

    {{-- TOTAL PERUSAHAAN --}}
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


    {{-- LOWONGAN AKTIF --}}
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


    {{-- LOWONGAN TUTUP --}}
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
                <th style="text-align:center">DURASI</th>
                <th style="text-align:center">TIPE</th>
                <th>STATUS</th>
                <th style="text-align:center">AKSI</th>

            </tr>

        </thead>

        <tbody>

            @forelse ($perusahaan as $item)

                <tr>

                    {{-- PROFILE --}}
                    <td>

                        <div class="company">

                            {{-- LOGO --}}
                            <div class="company-logo">

                                @if($item->logo)

                                    <img src="{{ asset('storage/' . $item->logo) }}"
                                         alt="Logo"
                                         style="
                                            width:45px;
                                            height:45px;
                                            border-radius:50%;
                                            object-fit:cover;
                                         ">

                                @else

                                    {{ strtoupper(substr($item->name, 0, 1)) }}

                                @endif

                            </div>

                            <div>

                                <strong>
                                    {{ $item->name }}
                                </strong>

                                <br>

                                <small style="color:#7C8299;">

                                    {{ $item->kota ?? '-' }},
                                    {{ $item->provinsi ?? '-' }}

                                </small>

                            </div>

                        </div>

                    </td>


                    {{-- INDUSTRI --}}
                    <td>

                        <span class="badge badge-blue">

                            {{ strtoupper($item->tipe_industri ?? '-') }}

                        </span>

                    </td>


                    {{-- POSISI --}}
                    <td>

                        {{ $item->posisi_magang ?? '-' }}

                    </td>


                    {{-- DURASI --}}
                    <td style="text-align:center">

                        {{ $item->duration_months ?? 0 }} bulan

                    </td>


                    {{-- TIPE --}}
                    <td style="text-align:center">

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


                    {{-- STATUS --}}
                    <td>

                        <form action="{{ route('dashboard.toggle_status', $item->id) }}"
                              method="POST">

                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                    style="
                                        border:none;
                                        background:none;
                                        padding:0;
                                        cursor:pointer;
                                    ">

                                <div class="switch {{ $item->status_magang == 'Unpaid' ? 'off' : '' }}"></div>

                            </button>

                        </form>

                    </td>


                    {{-- AKSI --}}
                    <td>

                        <div class="action-buttons">

                            {{-- EDIT --}}
                            <a href="{{ route('dashboard.edit', $item->id) }}"
                               class="action-btn edit">

                                <i class="fa-solid fa-pen"></i>

                            </a>


                            {{-- DELETE --}}
                            <form action="{{ route('dashboard.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="action-btn delete"
                                        style="border:none;">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7"
                        style="
                            text-align:center;
                            padding:30px;
                        ">

                        Data perusahaan belum tersedia

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <!-- PAGINATION -->
    <div class="pagination-wrapper">

        <div class="pagination-info">

            Showing
            {{ $perusahaan->firstItem() }}
            to
            {{ $perusahaan->lastItem() }}
            of
            {{ $perusahaan->total() }}
            results

        </div>


        <div class="pagination-buttons">

            {{-- PREVIOUS --}}
            @if ($perusahaan->onFirstPage())

                <span class="page-btn disabled">

                    <i class="fa-solid fa-chevron-left"></i>

                </span>

            @else

                <a href="{{ $perusahaan->previousPageUrl() }}"
                   class="page-btn">

                    <i class="fa-solid fa-chevron-left"></i>

                </a>

            @endif


            {{-- NUMBER --}}
            @for ($i = 1; $i <= $perusahaan->lastPage(); $i++)

                <a href="{{ $perusahaan->url($i) }}"
                   class="page-btn {{ $perusahaan->currentPage() == $i ? 'active' : '' }}">

                    {{ $i }}

                </a>

            @endfor


            {{-- NEXT --}}
            @if ($perusahaan->hasMorePages())

                <a href="{{ $perusahaan->nextPageUrl() }}"
                   class="page-btn">

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


{{-- SEARCH --}}
<script>

document.getElementById('searchInput')
    .addEventListener('keyup', function () {

    let value = this.value.toLowerCase().trim();

    let rows = document.querySelectorAll('#companyTable tbody tr');

    rows.forEach(row => {

        let text = row.innerText.toLowerCase();

        if (text.includes(value) || value === '') {

            row.style.display = '';

        } else {

            row.style.display = 'none';

        }

    });

});

</script>

@endsection