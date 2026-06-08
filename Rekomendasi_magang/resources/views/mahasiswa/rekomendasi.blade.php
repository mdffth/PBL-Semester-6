<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekomendasi Perusahaan — RekomIn</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/mahasiswa/rekomendasi_page.css') }}">

</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="navbar-brand">
            <div class="brand-logo">RI</div>
            <span class="brand-name">RekomIn</span>
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="{{ route('rekomendasi') }}" class="active">Perusahaan</a></li>
            <li>
                <a href="{{ route('recommendation.index') }}" class="nav-btn">
                    Start Rekomendasi
                </a>
            </li>
        </ul>
    </nav>

    {{-- TITLE --}}
    <div class="page-title-bar">
        <h1>Daftar Perusahaan yang Tersedia untuk Tempat Magang</h1>
    </div>
    
    {{-- FILTER --}}
    <form method="GET" action="{{ route('rekomendasi') }}">
        
        <div class="filter-bar">
        <i class="fas fa-filter filter-icon"></i>

        {{-- Benefit --}}
        <div class="filter-select-wrap">
            <select name="benefit"
                    class="filter-select"
                    onchange="this.form.submit()">

                <option value="">Benefit</option>

                @foreach($benefitList as $benefit)
                    <option value="{{ $benefit }}"
                        {{ request('benefit') == $benefit ? 'selected' : '' }}>
                        {{ $benefit }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Provinsi --}}
        <div class="filter-select-wrap">
            <select name="provinsi"
                    class="filter-select"
                    onchange="this.form.submit()">

                <option value="">Provinsi</option>

                @foreach($provinsiList as $provinsi)
                    <option value="{{ $provinsi }}"
                        {{ request('provinsi') == $provinsi ? 'selected' : '' }}>
                        {{ $provinsi }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Kota --}}
        <div class="filter-select-wrap">
            <select name="kota"
                    class="filter-select"
                    onchange="this.form.submit()">

                <option value="">Kota</option>

                @foreach($kotaList as $kota)
                    <option value="{{ $kota }}"
                        {{ request('kota') == $kota ? 'selected' : '' }}>
                        {{ $kota }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Reset --}}
        <a href="{{ route('rekomendasi') }}"
            class="btn-reset-filter">
            Reset
        </a>

    </div>

</form>

    {{-- CONTENT --}}
    <div class="content-wrap">

        <p class="result-info">
            Menampilkan
            <strong>{{ $perusahaan->count() }}</strong>
            dari
            <strong>{{ $totalPerusahaan }}</strong>
            hasil rekomendasi
        </p>

        @if ($perusahaan->count() > 0)

            <div class="cards-grid">
                @foreach ($perusahaan as $i => $p)

                    <div class="r-card">

                        {{-- IMAGE --}}
                        <div class="r-card-img">
                            @if ($p->logo)
                                <img src="{{ asset($p->logo) }}" alt="{{ $p->name }}">
                            @else
                                <div class="img-placeholder">
                                    <i class="fas fa-building"></i>
                                </div>
                            @endif
                        </div>

                        {{-- BODY --}}
                        <div class="r-card-body">
                            <div class="r-card-name">{{ $p->name }}</div>

                            <div class="r-card-row">
                                <span>Tipe Industri:</span>
                                {{ Str::limit($p->tipe_industri, 55) }}
                            </div>

                            <div class="r-card-row">
                                <span>Posisi :</span>
                                {{ Str::limit($p->posisi_magang, 55) }}
                            </div>
                            
                            <div class="r-card-row">
                                <span>Benefit :</span>
                                {{ Str::limit($p->benefit, 55) }}
                            </div>
                            
                            <div class="r-card-row">
                                <span>Provinsi :</span>
                                {{ Str::limit($p->provinsi, 55) }}
                            </div>
                            <div class="r-card-row">
                                <span>Kota :</span>
                                {{ Str::limit($p->kota, 55) }}
                            </div>

                            <a href="{{ route('detail.perusahaan', $p->id) }}" class="btn-r-detail">
                                Lihat Detail
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="pagination">

                {{-- PREV --}}
                @if ($perusahaan->onFirstPage())
                    <span class="disabled">‹ Prev</span>
                @else
                    <a href="{{ $perusahaan->previousPageUrl() }}">‹ Prev</a>
                @endif

                {{-- NUMBER --}}
                @for ($i = 1; $i <= $perusahaan->lastPage(); $i++)
                    <a href="{{ $perusahaan->url($i) }}"
                       class="{{ $i == $perusahaan->currentPage() ? 'active' : '' }}">
                        {{ $i }}
                    </a>
                @endfor

                {{-- NEXT --}}
                @if ($perusahaan->hasMorePages())
                    <a href="{{ $perusahaan->nextPageUrl() }}">Next ›</a>
                @else
                    <span class="disabled">Next ›</span>
                @endif

            </div>

        @else
            <p style="text-align:center; color:#888; padding: 3rem 0;">
                Tidak ada perusahaan yang sesuai filter.
            </p>
        @endif

    </div>

    {{-- FOOTER --}}
    <footer style="background:#1a1a2e; padding:1.5rem 5%; text-align:center; margin-top:3rem;">
        <p style="font-size:.85rem; color:rgba(255,255,255,0.5);">
            &copy; {{ date('Y') }} RekomIn — Platform Rekomendasi Magang Mahasiswa.
        </p>
    </footer>

</body>
</html>