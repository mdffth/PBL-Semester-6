<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Rekomendasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
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
        .nav-avatar { width: 34px; height: 34px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: .9rem; cursor: pointer; }

    .brand {
        font-size: 20px;
        font-weight: 800;
    }

    .content-wrap {
        padding: 40px 5%;
    }

    .page-title {
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .page-subtitle {
        color: #6b7280;
        margin-bottom: 30px;
        font-size: 15px;
    }

    .result-info {
        margin-bottom: 30px;
        font-size: 16px;
    }

    .result-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        align-items: stretch;
    }

    .result-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .result-card-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .company-img {
        width: 100%;
        height: 180px;
        overflow: hidden;
        background: linear-gradient(135deg, #1a1a6e, #3b3bdb);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: rgba(255,255,255,0.4);
        position: relative;
        flex-shrink: 0;
    }

    .company-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    .score-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #1a1a6e;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 13px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.25);
        z-index: 10;
        line-height: 1.1;
    }

    .result-header {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-height: 60px;
    }

    .result-header h3 {
        font-size: 16px;
        margin: 0 0 4px;
        font-weight: 700;
    }

    .result-header p {
        font-size: 13px;
        margin: 0;
        color: #4b5563;
    }

    .company-info {
        margin-top: 18px;
        font-size: 14px;
    }

    .company-info p {
        margin: 8px 0;
    }

    .score-section {
        margin-top: 18px;
        font-size: 14px;
        flex: 1;
    }

    .detail-section {
        margin-top: 18px;
        font-size: 14px;
        border-top: 1px solid #e5e7eb;
        padding-top: 15px;
        line-height: 1.6;
        margin-top: auto;
        padding-top: 15px;
    }

    .score-item {
        margin-bottom: 10px;
    }

    .score-top {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        margin-bottom: 4px;
    }

    .progress {
        background: #e5e7eb;
        height: 8px;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        background: #1d4ed8;
    }

    .btn-detail {
        display: block;
        text-align: center;
        background: #1a1a6e;
        color: white;
        padding: 12px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        margin-top: 10px;
        transition: 0.2s;
    }

    .btn-detail:hover {
        background: #15155c;
    }

    @media (max-width: 1024px) {
        .result-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .result-grid {
            grid-template-columns: 1fr;
        }

        .navbar {
            flex-direction: column;
            gap: 12px;
        }

        .page-title {
            font-size: 28px;
        }
    }

    .minat-tags {
    margin: 4px 0 0;
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}

.minat-tag {
    background: #eff6ff;
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
    border-radius: 20px;
    padding: 2px 10px;
    font-size: 11px;
    font-weight: 600;
    text-transform: capitalize;
}
/* =========================
   PAGE TITLE
========================= */
.page-title-bar{
    background:#fff;
    border-bottom:1px solid #e8e8f0;
    padding:1.5rem 5%;
}

.page-title-bar h1{
    font-size:1.2rem;
    font-weight:800;
    color:#1a1a2e;
}

/* =========================
   FILTER
========================= */
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
    transition:.2s;
}

.btn-reset-filter:hover{
    border-color:#3b3bdb;
    color:#3b3bdb;
}

/* =========================
   CONTENT
========================= */
.content-wrap{
    padding:1.5rem 5%;
    flex:1;
}

.result-info{
    font-size:.92rem;
    color:#555;
    margin-bottom:1.5rem;
}

.result-info strong{
    color:#3b3bdb;
}

/* =========================
   GRID
========================= */
.cards-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:1.5rem;
}

/* =========================
   CARD
========================= */
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

/* =========================
   MATCH BADGE
========================= */
.r-card-match{
    position:absolute;
    top:.8rem;
    right:.8rem;
    z-index:5;
    width:58px;
    height:58px;
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
    font-size:.9rem;
    font-weight:800;
    color:#fff;
    line-height:1;
}

.r-card-match .lbl{
    font-size:.6rem;
    color:rgba(255,255,255,.8);
}

/* =========================
   IMAGE
========================= */
.r-card-img{
    width:100%;
    height:180px;
    overflow:hidden;
    position:relative;
    background:linear-gradient(135deg,#1a1a6e,#3b3bdb);
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

/* =========================
   CARD BODY
========================= */
.r-card-body{
    padding:1rem 1.1rem 1.2rem;
    flex:1;
    display:flex;
    flex-direction:column;
}

.r-card-name{
    font-size:1rem;
    font-weight:800;
    color:#1a1a2e;
    margin-bottom:.7rem;
    line-height:1.4;
}

.r-card-row{
    font-size:.84rem;
    color:#555;
    margin-bottom:.4rem;
    line-height:1.5;
}

.r-card-row span{
    font-weight:700;
    color:#222;
}

/* =========================
   SCORE BAR
========================= */
.score-section{
    margin-top:1rem;
}

.score-item{
    margin-bottom:.7rem;
}

.score-top{
    display:flex;
    justify-content:space-between;
    font-size:.75rem;
    margin-bottom:.25rem;
    color:#555;
}

.score-top span:last-child{
    font-weight:700;
    color:#1a1a2e;
}

.progress{
    background:#e8e8f0;
    height:6px;
    border-radius:10px;
    overflow:hidden;
}

.progress-bar{
    height:100%;
    background:#3b3bdb;
    border-radius:10px;
}

/* =========================
   BUTTON
========================= */
.btn-r-detail{
    display:block;
    text-align:center;
    background:#1a1a6e;
    color:#fff;
    padding:.75rem;
    border-radius:10px;
    text-decoration:none;
    font-size:.85rem;
    font-weight:700;
    margin-top:auto;
    transition:.2s;
}

.btn-r-detail:hover{
    background:#3b3bdb;
}

/* =========================
   RESPONSIVE
========================= */
@media(max-width:1000px){
    .cards-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:640px){
    .cards-grid{
        grid-template-columns:1fr;
    }

    .page-title-bar h1{
        font-size:1rem;
    }
}
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('landing') }}" class="navbar-brand">
        <div class="brand-logo">RI</div>
        <span class="brand-name">RekomIn</span>
    </a>
    <ul class="nav-links">
        <li><a href="{{ route('landing') }}" class="active">Home</a></li>
        <li><a href="#perusahaan">Perusahaan</a></li>
        <li>
    <a href="{{ route('recommendation.index') }}" class="nav-btn">
        Start Rekomendasi
    </a>
</li>
    </ul>
</nav>

    {{-- TITLE --}}
    <div class="page-title-bar">
        <h1>Hasil Rekomendasi Perusahaan Magang</h1>
    </div>

    {{-- FILTER --}}
    <form method="GET" action="{{ route('recommendation.result') }}">

        <div class="filter-bar">
        <i class="fas fa-filter filter-icon"></i>

        {{-- Filter Benefit --}}
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

        {{-- Filter Provinsi --}}
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

        {{-- Filter Kota --}}
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

        {{-- Reset Filter --}}
        <a href="{{ route('recommendation.result') }}"
            class="btn-reset-filter">
            Reset
        </a>

    </div>

</form>

    {{-- CONTENT --}}
    <div class="content-wrap">

        <p class="result-info">
            Menampilkan
            <strong>{{ $results->count() }}</strong>
            hasil rekomendasi terbaik untukmu.
        </p>

        <div class="cards-grid">

            @foreach ($results as $result)

                @php
                    $company = $result->perusahaan;
                @endphp

                <div class="r-card">

                    {{-- GAMBAR PERUSAHAAN --}}
                    <div class="company-img">
                        @if($company->logo)
                            <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}">
                        @endif

                        {{-- BADGE PERSENTASE DI POJOK KANAN ATAS --}}
                        <div class="score-badge">
                            {{ number_format($result->final_score * 100, 1) }}%
                        </div>
                    </div>

                    <div class="result-card-body">

                        <div class="result-header">
                            <h3>
                                #{{ $result->ranking }}
                                {{ $company->name }}
                            </h3>

                            {{-- SEMUA BIDANG POSISI PERUSAHAAN --}}
                            @if($company->minatBidang->count() > 0)
                                <p class="minat-tags">
                                    @foreach($company->minatBidang as $posisi)
                                        <span class="minat-tag">{{ $posisi->name }}</span>
                                    @endforeach
                                </p>
                            @endif
                        </div>
                        <div class="company-info">

                            <p>
                                <strong>Tipe Industri:</strong>
                                {{ $company->tipe_industri ?? '-' }}
                            </p>

                            <p>
                                <strong>Status Magang:</strong>
                                {{ $company->status_magang ?? '-' }}
                            </p>
                            
                            <p>
                                <strong>Provinsi:</strong>
                                {{ $company->provinsi ?? '-' }}
                            </p>
                            
                            <p>
                                <strong>Kota:</strong>
                                {{ $company->kota ?? '-' }}
                            </p>

                            <p>
                                <strong>Minimal IPK:</strong>
                                {{ $company->min_ipk ?? '-' }}
                            </p>

                            <p>
                                <strong>Durasi:</strong>
                                {{ $company->duration_months ?? '-' }} bulan
                            </p>

                        </div>

                        <div class="score-section">

                            <div class="score-item">
                                <div class="score-top">
                                    <span>Skill</span>
                                    <span>{{ number_format($result->score_skill * 100, 0) }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $result->score_skill * 100 }}%"></div>
                                </div>
                            </div>

                            <div class="score-item">
                                <div class="score-top">
                                    <span>Teknologi</span>
                                    <span>{{ number_format($result->score_technology * 100, 0) }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $result->score_technology * 100 }}%"></div>
                                </div>
                            </div>

                            <div class="score-item">
                                <div class="score-top">
                                    <span>Minat</span>
                                    <span>{{ number_format($result->score_minat * 100, 0) }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $result->score_minat * 100 }}%"></div>
                                </div>
                            </div>

                            <div class="score-item">
                                <div class="score-top">
                                    <span>IPK</span>
                                    <span>{{ number_format($result->score_ipk * 100, 0) }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $result->score_ipk * 100 }}%"></div>
                                </div>
                            </div>

                        </div>

                        <div class="detail-section">
                            <a href="{{ route('detail.perusahaan', $company->id) }}" class="btn-detail">
                                Lihat Detail →
                            </a>
                        </div>

                    </div>{{-- end result-card-body --}}

                </div>

            @endforeach

        </div>
        

    </div>

    {{-- FOOTER --}}
    <footer style="background:#1a1a2e; padding:1.5rem 5%; text-align:center; margin-top:3rem;">
        <p style="font-size:.85rem; color:rgba(255,255,255,0.5);">
            &copy; {{ date('Y') }} RekomIn — Platform Rekomendasi Magang Mahasiswa.
        </p>
    </footer>
</body>

</html>