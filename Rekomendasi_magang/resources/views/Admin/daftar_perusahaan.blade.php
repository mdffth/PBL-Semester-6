@extends('layouts.perusahaan')

@section('topbar_title', 'Dashboard Admin')

@section('content')
                <!-- PAGE HEADER -->

                <div class="page-header">

                    <div>
                        <div class="page-title">
                            Daftar Perusahaan
                        </div>
                        <div class="page-subtitle">
                            Kelola data perusahaan mitra dan lowongan magang mahasiswa.
                        </div>
                    </div>

                </div>

                <!-- STATS -->
                
                <!-- BAR CHART -->

                <!-- TABLE -->

                <div class="card table-card">

                    {{-- <div class="table-header">

                        <div class="table-title">
                            Daftar Perusahaan
                        </div>

                        <input type="text"
                            id="searchInput"
                            class="search-box"
                            placeholder="Cari perusahaan, status, posisi, bidang...">

                    </div> --}}

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
                                    Previous
                                </span>

                            @else

                                <a href="{{ $perusahaan->previousPageUrl() }}" class="page-btn">
                                    Previous
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
                                    Next
                                </a>

                            @else

                                <span class="page-btn disabled">
                                    Next
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

            // ambil kolom pertama (nama perusahaan)
            let companyName = row.querySelector('td:first-child strong')
                .innerText
                .toLowerCase();

            if (companyName.includes(value) || value === '') {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    });

    document.querySelectorAll('.toggle-status').forEach(toggle => {

        toggle.addEventListener('change', function () {

            let id = this.dataset.id;
            // let checkbox = this;

            fetch(`/admin/perusahaan/toggle_status/${id}`, {

                method: 'POST',

                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }

            })

            .then(response => response.json())

            .then(data => {

                // this.checked = data.status === 'Active';
                location.reload();

            })

            .catch(error => {

                console.log(error);

            });

        });


    });
</script>

@endsection