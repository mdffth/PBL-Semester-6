<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekomendasi Perusahaan — RekomIntern</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
        }

        body{
            font-family:'Inter',sans-serif;
            background:#f4f6fb;
            color:#1a1a2e;
        }

        /* NAVBAR */
        .navbar{
            background:#1a1a6e;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:.9rem 5%;
            position:sticky;
            top:0;
            z-index:100;
        }

        .navbar-brand{
            display:flex;
            align-items:center;
            gap:.6rem;
            text-decoration:none;
        }

        .brand-logo{
            width:32px;
            height:32px;
            background:#fff;
            border-radius:7px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:800;
            color:#1a1a6e;
            font-size:.8rem;
        }

        .brand-name{
            color:#fff;
            font-weight:700;
            font-size:1rem;
        }

        .nav-links{
            display:flex;
            align-items:center;
            gap:1.8rem;
            list-style:none;
        }

        .nav-links a{
            color:rgba(255,255,255,0.8);
            text-decoration:none;
            font-size:.88rem;
            font-weight:500;
        }

        .nav-links a:hover{
            color:#fff;
        }

        .nav-btn{
            background:#3b3bdb;
            color:#fff !important;
            padding:.45rem 1.2rem;
            border-radius:8px;
            font-weight:600 !important;
        }

        .nav-avatar{
            width:32px;
            height:32px;
            background:rgba(255,255,255,0.2);
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#fff;
            font-size:.85rem;
        }

        /* TITLE */
        .page-title-bar{
            background:#fff;
            border-bottom:1px solid #e8e8f0;
            padding:1.5rem 5%;
        }

        .page-title-bar h1{
            font-size:1.15rem;
            font-weight:800;
            color:#1a1a2e;
        }

        /* FILTER */
        .filter-bar{
            background:#fff;
            border-bottom:1px solid #e8e8f0;
            padding:.9rem 5%;
            display:flex;
            align-items:center;
            gap:.8rem;
            flex-wrap:wrap;
        }

        .filter-icon{
            color:#3b3bdb;
            font-size:1rem;
        }

        .filter-select-wrap{
            position:relative;
        }

        .filter-select{
            appearance:none;
            background:#fff;
            border:1.5px solid #d0d0e8;
            border-radius:20px;
            padding:.45rem 2rem .45rem 1rem;
            font-size:.85rem;
            font-weight:600;
            color:#1a1a2e;
            cursor:pointer;
            outline:none;
            font-family:'Inter',sans-serif;
        }

        .filter-select-wrap::after{
            content:'▾';
            position:absolute;
            right:.7rem;
            top:50%;
            transform:translateY(-50%);
            color:#888;
            font-size:.8rem;
            pointer-events:none;
        }

        .btn-reset-filter{
            background:#fff;
            border:1.5px solid #d0d0e8;
            border-radius:20px;
            padding:.45rem 1rem;
            text-decoration:none;
            color:#555;
            font-size:.85rem;
            font-weight:600;
        }

        .btn-reset-filter:hover{
            border-color:#3b3bdb;
            color:#3b3bdb;
        }

        /* CONTENT */
        .content-wrap{
            padding:1.5rem 5%;
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
        .cards-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:1.5rem;
        }

        /* CARD */
        .r-card{
            background:#fff;
            border-radius:16px;
            overflow:hidden;
            border:1.5px solid #e8e8f0;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
            transition:.25s;
            position:relative;
            display:flex;
            flex-direction:column;
        }

        .r-card:hover{
            transform:translateY(-4px);
            box-shadow:0 12px 32px rgba(26,26,110,0.12);
            border-color:#3b3bdb;
        }

        /* MATCH */
        .r-card-match{
            position:absolute;
            top:.8rem;
            right:.8rem;
            z-index:5;
            width:52px;
            height:52px;
            border-radius:50%;
            background:#1a1a6e;
            border:3px solid #fff;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            box-shadow:0 2px 8px rgba(0,0,0,0.25);
        }

        .r-card-match .pct{
            font-size:.78rem;
            font-weight:800;
            color:#fff;
        }

        .r-card-match .lbl{
            font-size:.52rem;
            color:rgba(255,255,255,0.8);
        }

        /* IMAGE */
        .r-card-img{
            width:100%;
            height:160px;
            min-height:160px;
            max-height:160px;
            overflow:hidden;
            position:relative;
            background:#1a1a6e;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .r-card-img img{
            width:100%;
            height:100%;
            object-fit:cover;
            object-position:center;
            display:block;
        }

        .img-placeholder{
            width:100%;
            height:100%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:3rem;
            color:rgba(255,255,255,0.3);
        }

        /* BODY */
        .r-card-body{
            padding:1rem 1.1rem 1.2rem;
            flex:1;
            display:flex;
            flex-direction:column;
        }

        .r-card-name{
            font-size:.92rem;
            font-weight:700;
            color:#1a1a2e;
            margin-bottom:.5rem;
            line-height:1.3;
        }

        .r-card-row{
            font-size:.78rem;
            color:#555;
            margin-bottom:.3rem;
        }

        .r-card-row span{
            font-weight:600;
            color:#333;
        }

        .btn-r-detail{
            display:block;
            text-align:center;
            background:#1a1a6e;
            color:#fff;
            padding:.6rem;
            border-radius:8px;
            text-decoration:none;
            font-size:.83rem;
            font-weight:600;
            margin-top:auto;
        }

        .btn-r-detail:hover{
            background:#3b3bdb;
        }

        /* PAGINATION */
        .pagination{
            display:flex;
            justify-content:center;
            gap:.5rem;
            margin-top:2.5rem;
            flex-wrap:wrap;
        }

        .pagination a,
        .pagination span{
            padding:.5rem .9rem;
            border-radius:8px;
            font-size:.85rem;
            font-weight:600;
            text-decoration:none;
            border:1.5px solid #e0e0ea;
            color:#555;
            background:#fff;
            transition:all .2s;
        }

        .pagination a:hover,
        .pagination .active{
            background:#1a1a6e;
            color:#fff;
            border-color:#1a1a6e;
        }

        .pagination .disabled{
            color:#ccc;
            pointer-events:none;
        }

        @media(max-width:1000px){
            .cards-grid{
                grid-template-columns:repeat(2,1fr);
            }
        }

        @media(max-width:640px){
            .cards-grid{
                grid-template-columns:1fr;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <a href="/" class="navbar-brand">
        <div class="brand-logo">RI</div>
        <span class="brand-name">RekomIntern</span>
    </a>

    <ul class="nav-links">
        <li><a href="{{ route('landing') }}">Home</a></li>
        <li><a href="{{ route('rekomendasi') }}">Perusahaan</a></li>

        <li>
            <a href="{{ route('rekomendasi') }}" class="nav-btn">
                Start Rekomendasi
            </a>
        </li>

        {{-- <li>
            <div class="nav-avatar">
                <i class="fas fa-user"></i>
            </div>
        </li> --}}
    </ul>

</nav>

<div class="page-title-bar">
    <h1>
        Berdasarkan Profil Kamu, Berikut Merupakan Rekomendasi Magang Terbaik:
    </h1>
</div>

<form method="GET" action="{{ route('rekomendasi') }}">

    <div class="filter-bar">

        <i class="fas fa-filter filter-icon"></i>

        {{-- FILTER JENIS --}}
        <div class="filter-select-wrap">

            <select name="status_magang"
                    class="filter-select"
                    onchange="this.form.submit()">

                <option value="">Jenis</option>

                <option value="Paid"
                    {{ request('status_magang') == 'Paid' ? 'selected' : '' }}>
                    Paid
                </option>

                <option value="Unpaid"
                    {{ request('status_magang') == 'Unpaid' ? 'selected' : '' }}>
                    Unpaid
                </option>

            </select>

        </div>

        {{-- FILTER LOKASI --}}
        <div class="filter-select-wrap">

            <select name="tipe_industri"
                    class="filter-select"
                    onchange="this.form.submit()">

                <option value="">Lokasi</option>

                @foreach($tipeIndustri ?? [] as $tipe)

                    <option value="{{ $tipe }}"
                        {{ request('tipe_industri') == $tipe ? 'selected' : '' }}>

                        {{ Str::limit($tipe, 30) }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- RESET --}}
        <a href="{{ route('rekomendasi') }}" class="btn-reset-filter">
            Reset
        </a>

    </div>

</form>

<div class="content-wrap">

    <p class="result-info">
        Menampilkan
        <strong>{{ $perusahaan->count() }}</strong>
        dari
        <strong>{{ $totalPerusahaan }}</strong>
        hasil rekomendasi
    </p>

    @if($perusahaan->count() > 0)

    @php

        $fotoPerusahaan = [
            'Ariverse Studio (PT Studio Karya Semesta)' => 'Ariverse.jpg',
            'Atria Hotel Malang' => 'Atria.jpg',
            'CV DB KLIK' => 'Db Klik.jpg',
            'CV Harsyad Utama (Harsyad Teknologi)' => 'Harsyad.jpg',
            'DOT Indonesia' => 'dot.jpg',
            'Humas POLINEMA' => 'Humas.jpg',
            'Oyitok Group' => 'Oyi.jpg',
            'Pengembangan Platform Satu Peta Jatim - Batch 2' => 'Peta.jpg',
            'Pengembangan Platform Satu Peta Jatim - PT Link Apisindo Media & Dinas Kominfo Jatim' => 'Peta.jpg',
            'Pengembangan SIPP - PT Link Apisindo Media & Dinas LH Kota Batu' => 'DLH.jpg',
            'Politeknik Batu' => 'PoltekBatu.jpg',
            'PT Alfath Corporation' => 'Alfath.jpg',
            'PT ARM Solusi' => 'ARM.jpg',
            'PT Dutakom Wibawa Putra' => 'd-net.jpg',
            'PT Green Energi Utama' => 'Green.jpg',
            'PT Indoprima Gemilang' => 'PT Indo.jpg',
            'PT Industri Kereta Api / PT INKA (Persero)' => 'inka.jpg',
            'PT Intelix Global Crossing' => 'Intelix.jpg',
            'PT JST Indonesia' => 'JST.jpg',
            'PT Maxchat Inovasi Indonesia' => 'MaxChat.jpg',
            'PT PAL Indonesia (Persero)' => 'PAL.jpg',
            'PT Peruri Wira Timur' => 'Peruri.jpg',
            'PT Rekaindo Global Jasa' => 'Reka.jpg',
            'PT Sekuriti Siber Indonesia' => 'Siber.jpg',
            'PT Time Door Indonesia' => 'Time.jpg',
            'PT UTERO KREATIF INDONESIA' => 'Utero.jpg',
            'Sarastya Agility Innovations' => 'Sarastya.jpg',
            'The Himana Hotel & Mall Malang City Point' => 'Hotel.jpg',
            'UPA Bahasa Polinema' => 'UPA.jpg',
            'Wakil Direktur 4 Politeknik Negeri Malang' => 'Wadir4.jpg',

        ];

        $gradients = [
            'linear-gradient(135deg,#1a1a6e,#3b3bdb)',
            'linear-gradient(135deg,#0f4c75,#1b6ca8)',
            'linear-gradient(135deg,#1a5276,#2980b9)',
            'linear-gradient(135deg,#154360,#1a5276)',
            'linear-gradient(135deg,#212f3c,#2e4057)',
            'linear-gradient(135deg,#0d1b2a,#1b3a5c)',
        ];

        $matchScores = [98,95,90,87,85,82,80,78,75,72,70];

    @endphp

    <div class="cards-grid">

        @foreach($perusahaan as $i => $p)

        @php

            $score = $matchScores[$i] ?? 70;

            $grad = $gradients[$i % count($gradients)];

            $foto = $fotoPerusahaan[$p->name] ?? null;

            $lokasi = 'Malang';

            $ti = strtolower($p->tipe_industri ?? '');

            if(str_contains($ti,'jakarta')){
                $lokasi = 'Jakarta';
            }
            elseif(str_contains($ti,'surabaya')){
                $lokasi = 'Surabaya';
            }
            elseif(str_contains($ti,'bali')){
                $lokasi = 'Bali';
            }
            elseif(str_contains($ti,'bandung')){
                $lokasi = 'Bandung';
            }

        @endphp

        <div class="r-card">

            {{-- MATCH --}}
            <div class="r-card-match">
                <div class="pct">{{ $score }}%</div>
                <div class="lbl">Match</div>
            </div>

            {{-- IMAGE --}}
            <div class="r-card-img" style="background: {{ $grad }}">

                @if($foto)

                    <img src="{{ asset('img/perusahaan/' . $foto) }}"
                         alt="{{ $p->name }}">

                @else

                    <div class="img-placeholder">
                        <i class="fas fa-building"></i>
                    </div>

                @endif

            </div>

            {{-- BODY --}}
            <div class="r-card-body">

                <div class="r-card-name">
                    {{ $p->name }}
                </div>

                <div class="r-card-row">
                    <span>Fokus :</span>
                    {{ Str::limit($p->posisi_magang, 55) }}
                </div>

                <div class="r-card-row">
                    <span>Lokasi :</span>
                    {{ $lokasi }}
                </div>

                <div class="r-card-row" style="margin-bottom:.8rem">
                    <span>Tipe Magang :</span>

                    {{ $p->status_magang === 'Paid' ? 'Onsite' : 'Remote' }}
                    •
                    {{ $p->status_magang }}
                </div>

                <a href="{{ route('rekomendasi') }}"
                   class="btn-r-detail">

                    Lihat Detail

                </a>

            </div>

        </div>

        @endforeach

    </div>

    {{-- PAGINATION --}}
    <div class="pagination">

        {{-- PREV --}}
        @if($perusahaan->onFirstPage())

            <span class="disabled">‹ Prev</span>

        @else

            <a href="{{ $perusahaan->previousPageUrl() }}">
                ‹ Prev
            </a>

        @endif

        {{-- NUMBER --}}
        @for($i = 1; $i <= $perusahaan->lastPage(); $i++)

            <a href="{{ $perusahaan->url($i) }}"
               class="{{ $i == $perusahaan->currentPage() ? 'active' : '' }}">

                {{ $i }}

            </a>

        @endfor

        {{-- NEXT --}}
        @if($perusahaan->hasMorePages())

            <a href="{{ $perusahaan->nextPageUrl() }}">
                Next ›
            </a>

        @else

            <span class="disabled">Next ›</span>

        @endif

    </div>

    @endif

</div>

</body>
</html>