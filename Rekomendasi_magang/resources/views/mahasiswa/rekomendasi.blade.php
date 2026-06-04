<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekomendasi Perusahaan — RekomIn</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

     <style>
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
        }

        html, body {
            height: 100%;
        }

        body{
            font-family:'Inter',sans-serif;
            background:#f4f6fb;
            color:#1a1a2e;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* WRAPPER untuk content yang flex */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .navbar { background: #1a1a6e; display: flex; align-items: center; justify-content: space-between; padding: .9rem 5%; position: sticky; top: 0; z-index: 100; }
        .navbar-brand { display: flex; align-items: center; gap: .6rem; text-decoration: none; }
        .brand-logo { width: 36px; height: 36px; background: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: #1a1a6e; font-size: .85rem; }
        .brand-name { color: #fff; font-weight: 700; font-size: 1.1rem; }
        .nav-links { display: flex; align-items: center; gap: 2rem; list-style: none; }
        .nav-links a { color: rgba(255,255,255,0.85); text-decoration: none; font-size: .9rem; font-weight: 500; transition: color .2s; }
        .nav-links a:hover, .nav-links a.active { color: #fff; }
        .nav-btn { background: #3b3bdb; color: #fff !important; padding: .5rem 1.3rem; border-radius: 8px; font-weight: 600 !important; }
        .nav-btn:hover { background: #2d2db8 !important; }

        /* TITLE */
        .page-title-bar { background: #fff; border-bottom: 1px solid #e8e8f0; padding: 1.5rem 5%; }
        .page-title-bar h1 { font-size: 1.15rem; font-weight: 800; color: #1a1a2e; }

        /* FILTER */
        .filter-bar { background: #fff; border-bottom: 1px solid #e8e8f0; padding: .9rem 5%; display: flex; align-items: center; gap: .8rem; flex-wrap: wrap; }
        .filter-icon { color: #3b3bdb; font-size: 1rem; }
        .filter-select-wrap { position: relative; }
        .filter-select { appearance: none; background: #fff; border: 1.5px solid #d0d0e8; border-radius: 20px; padding: .45rem 2rem .45rem 1rem; font-size: .85rem; font-weight: 600; color: #1a1a2e; cursor: pointer; outline: none; font-family: 'Inter', sans-serif; }
        .filter-select-wrap::after { content: '▾'; position: absolute; right: .7rem; top: 50%; transform: translateY(-50%); color: #888; font-size: .8rem; pointer-events: none; }
        .btn-reset-filter { background: #fff; border: 1.5px solid #d0d0e8; border-radius: 20px; padding: .45rem 1rem; text-decoration: none; color: #555; font-size: .85rem; font-weight: 600; }
        .btn-reset-filter:hover { border-color: #3b3bdb; color: #3b3bdb; }

        /* CONTENT */
        .content-wrap{
            padding:1.5rem 5%;
            flex: 1;
        }

        .result-info{
            font-size:.88rem;
            color:#555;
            margin-bottom:1.5rem;
        }

        .result-info strong{
            color:#3b3bdb;
        }

        /* GRID */
        .cards-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }

        /* CARD */
        .r-card { background: #fff; border-radius: 16px; overflow: hidden; border: 1.5px solid #e8e8f0; box-shadow: 0 2px 10px rgba(0,0,0,0.05); transition: .25s; position: relative; display: flex; flex-direction: column; }
        .r-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(26,26,110,0.12); border-color: #3b3bdb; }

        /* MATCH BADGE */
        .r-card-match { position: absolute; top: .8rem; right: .8rem; z-index: 5; width: 52px; height: 52px; border-radius: 50%; background: #1a1a6e; border: 3px solid #fff; display: flex; flex-direction: column; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.25); }
        .r-card-match .pct { font-size: .78rem; font-weight: 800; color: #fff; }
        .r-card-match .lbl { font-size: .52rem; color: rgba(255,255,255,0.8); }

        /* IMAGE */
        .r-card-img { width: 100%; height: 160px; min-height: 160px; max-height: 160px; overflow: hidden; position: relative; background: linear-gradient(135deg,#1a1a6e,#3b3bdb); display: flex; align-items: center; justify-content: center; }
        .r-card-img img { width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; }
        .img-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: rgba(255,255,255,0.3); }

        /* BODY */
        .r-card-body { padding: 1rem 1.1rem 1.2rem; flex: 1; display: flex; flex-direction: column; }
        .r-card-name { font-size: .92rem; font-weight: 700; color: #1a1a2e; margin-bottom: .5rem; line-height: 1.3; }
        .r-card-row { font-size: .78rem; color: #555; margin-bottom: .3rem; }
        .r-card-row span { font-weight: 600; color: #333; }
        .btn-r-detail { display: block; text-align: center; background: #1a1a6e; color: #fff; padding: .6rem; border-radius: 8px; text-decoration: none; font-size: .83rem; font-weight: 600; margin-top: auto; }
        .btn-r-detail:hover { background: #3b3bdb; }

        /* PAGINATION */
        .pagination { display: flex; justify-content: center; gap: .5rem; margin-top: 2.5rem; flex-wrap: wrap; }
        .pagination a, .pagination span { padding: .5rem .9rem; border-radius: 8px; font-size: .85rem; font-weight: 600; text-decoration: none; border: 1.5px solid #e0e0ea; color: #555; background: #fff; transition: all .2s; }
        .pagination a:hover, .pagination .active { background: #1a1a6e; color: #fff; border-color: #1a1a6e; }
        .pagination .disabled { color: #ccc; pointer-events: none; }

        /* FOOTER */
        footer {
            background: #1a1a2e;
            padding: 1.5rem 5%;
            text-align: center;
            margin-top: auto;
            width: 100%;
        }

        footer p {
            font-size: .85rem;
            color: rgba(255,255,255,0.5);
        }

        @media(max-width:1000px) { .cards-grid { grid-template-columns: repeat(2,1fr); } }
        @media(max-width:640px)  { .cards-grid { grid-template-columns: 1fr; } }
    </style>
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