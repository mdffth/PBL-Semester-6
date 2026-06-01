<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Rekomendasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #F5F7FB;
            color: #1E1E1E;
        }

        /* NAVBAR */
        .navbar {
            background: #1a1a6e;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .9rem 5%;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: .6rem;
            text-decoration: none;
        }

        .brand-logo {
            width: 36px;
            height: 36px;
            background: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #1a1a6e;
            font-size: .85rem;
        }

        .brand-name {
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: .9rem;
            font-weight: 500;
            transition: color .2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #fff;
        }

        .nav-btn {
            background: #3b3bdb;
            color: #fff !important;
            padding: .5rem 1.3rem;
            border-radius: 8px;
            font-weight: 600 !important;
        }

        .nav-btn:hover {
            background: #2d2db8 !important;
        }

        /* TITLE BAR */
        .page-title-bar {
            background: #fff;
            border-bottom: 1px solid #e8e8f0;
            padding: 1.5rem 5%;
        }

        .page-title-bar h1 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #1a1a2e;
        }

        /* FILTER BAR */
        .filter-bar {
            background: #fff;
            border-bottom: 1px solid #e8e8f0;
            padding: .9rem 5%;
            display: flex;
            align-items: center;
            gap: .8rem;
            flex-wrap: wrap;
        }

        .filter-icon {
            color: #3b3bdb;
            font-size: 1rem;
        }

        .filter-select-wrap {
            position: relative;
        }

        .filter-select {
            appearance: none;
            background: #fff;
            border: 1.5px solid #d0d0e8;
            border-radius: 20px;
            padding: .45rem 2rem .45rem 1rem;
            font-size: .85rem;
            font-weight: 600;
            color: #1a1a2e;
            cursor: pointer;
            outline: none;
            font-family: 'Inter', sans-serif;
        }

        .filter-select-wrap::after {
            content: '▾';
            position: absolute;
            right: .7rem;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: .8rem;
            pointer-events: none;
        }

        .btn-reset-filter {
            background: #fff;
            border: 1.5px solid #d0d0e8;
            border-radius: 20px;
            padding: .45rem 1rem;
            text-decoration: none;
            color: #555;
            font-size: .85rem;
            font-weight: 600;
        }

        .btn-reset-filter:hover {
            border-color: #3b3bdb;
            color: #3b3bdb;
        }

        /* CONTENT WRAP */
        .content-wrap {
            padding: 40px 5%;
        }

        /* PROFILE SUMMARY */
        .profile-summary {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .summary-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .summary-value {
            font-weight: 700;
        }

        /* RESULT INFO */
        .result-info {
            margin: 24px 0;
            font-size: 16px;
        }

        .result-info strong {
            color: #3b3bdb;
        }

        /* RESULT GRID */
        .result-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        /* RESULT CARD */
        .result-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.25s, box-shadow 0.25s;
            position: relative;
        }

        .result-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(26, 26, 110, 0.12);
        }

        /* CARD IMAGE */
        .card-img {
            width: 100%;
            height: 160px;
            overflow: hidden;
            background: linear-gradient(135deg, #1a1a6e, #3b3bdb);
            position: relative;
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .img-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.3);
        }

        /* MATCH SCORE BUBBLE */
        .match-bubble {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #1a1a6e;
            border: 3px solid white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 5;
        }

        .match-bubble .pct {
            font-size: 0.85rem;
            font-weight: 800;
            color: white;
        }

        .match-bubble .lbl {
            font-size: 0.55rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* CARD BODY */
        .result-card-body {
            padding: 18px 20px 22px;
        }

        .result-header {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .result-header h3 {
            font-size: 18px;
            margin: 0 0 8px;
        }

        .result-header p {
            font-size: 13px;
            margin: 0;
            color: #4b5563;
        }

        .company-info {
            margin: 15px 0;
            font-size: 13px;
            border-top: 1px solid #eef2f6;
            padding-top: 12px;
        }

        .company-info p {
            margin: 6px 0;
        }

        .score-section {
            margin: 15px 0;
        }

        .score-item {
            margin-bottom: 12px;
        }

        .score-top {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            margin-bottom: 4px;
            color: #4b5563;
        }

        .progress {
            background: #e5e7eb;
            height: 6px;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: #1a1a6e;
            border-radius: 10px;
        }

        .btn-detail {
            display: block;
            text-align: center;
            background: #1a1a6e;
            color: #fff;
            padding: .7rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: .85rem;
            font-weight: 600;
            margin-top: 16px;
            transition: background 0.2s;
        }

        .btn-detail:hover {
            background: #3b3bdb;
        }

        /* PAGINATION */
        .pagination {
            display: flex;
            justify-content: center;
            gap: .5rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            padding: .5rem .9rem;
            border-radius: 8px;
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            border: 1.5px solid #e0e0ea;
            color: #555;
            background: #fff;
            transition: all .2s;
        }

        .pagination a:hover,
        .pagination .active {
            background: #1a1a6e;
            color: #fff;
            border-color: #1a1a6e;
        }

        .pagination .disabled {
            color: #ccc;
            pointer-events: none;
        }

        @media (max-width: 1024px) {
            .result-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {

            .result-grid,
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                flex-direction: column;
                gap: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="navbar-brand">
            <div class="brand-logo">RI</div>
            <span class="brand-name">RekomIn</span>
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="{{ route('rekomendasi') }}">Perusahaan</a></li>
            <li>
                <a href="{{ route('recommendation.index') }}" class="nav-btn">
                    Start Rekomendasi
                </a>
            </li>
            @if (Route::has('login'))
                @auth
                    <li>
                        <a href="{{ url('/dashboard') }}" class="nav-btn"
                            style="background: transparent; border:1px solid rgba(255,255,255,0.3);">
                            Dashboard
                        </a>
                    </li>
                @else
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="nav-btn"
                                style="background: transparent; border:1px solid rgba(255,255,255,0.3);">
                                Register
                            </a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
    </nav>

    <!-- TITLE BAR -->
    <div class="page-title-bar">
        <h1>
            Berdasarkan Profil Kamu, Berikut Merupakan Rekomendasi Magang Terbaik:
        </h1>
    </div>

    <!-- FILTER BAR -->
    <form method="GET" action="{{ route('recommendation.result', $user->session_uuid) }}">
        <div class="filter-bar">
            <i class="fas fa-filter filter-icon"></i>

            {{-- Filter Status Magang --}}
            <div class="filter-select-wrap">
                <select name="status_magang" class="filter-select" onchange="this.form.submit()">

                    <option value="">Jenis</option>

                    <option value="Paid" {{ request('status_magang') == 'Paid' ? 'selected' : '' }}>
                        Paid
                    </option>

                    <option value="Unpaid" {{ request('status_magang') == 'Unpaid' ? 'selected' : '' }}>
                        Unpaid
                    </option>
                </select>
            </div>

            {{-- Filter Lokasi --}}
            <div class="filter-select-wrap">
                <select name="lokasi" class="filter-select" onchange="this.form.submit()">

                    <option value="">Lokasi</option>

                    @foreach ($lokasiList ?? [] as $lokasi)
                        <option value="{{ $lokasi }}" {{ request('lokasi') == $lokasi ? 'selected' : '' }}>
                            {{ $lokasi }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Reset Filter --}}
            <a href="{{ route('recommendation.result', $user->session_uuid) }}" class="btn-reset-filter">
                Reset
            </a>
        </div>
    </form>

    <div class="content-wrap">

        <!-- PROFILE SUMMARY -->
        <div class="profile-summary">
            <div class="summary-grid">
                <div class="summary-item">
                    <div class="summary-label">IPK</div>
                    <div class="summary-value">{{ $user->ipk }}</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Skill</div>
                    <div class="summary-value">{{ $user->skills->pluck('name')->join(', ') ?: '-' }}</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Teknologi</div>
                    <div class="summary-value">{{ $user->technologies->pluck('name')->join(', ') ?: '-' }}</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Minat Bidang</div>
                    <div class="summary-value">{{ $user->minatBidang->pluck('name')->join(', ') ?: '-' }}</div>
                </div>
            </div>
        </div>

        {{-- <!-- RESULT INFO -->
        <p class="result-info">
            Menampilkan <strong>{{ $results->count() }}</strong>
            dari <strong>{{ $totalResults ?? $results->total() ?? $results->count() }}</strong>
            hasil rekomendasi
        </p> --}}

        <!-- RESULT GRID -->
        <div class="result-grid">
            @foreach ($results as $result)
                @php
                    $company = $result->perusahaan;
                    $finalScore = number_format($result->final_score * 100, 1);

                    // Foto perusahaan
                    $fotoPerusahaan = [
                        'Ariverse Studio (PT Studio Karya Semesta)' => 'Ariverse.jpg',
                        'Atria Hotel Malang' => 'Atria.jpg',
                        'CV DB KLIK' => 'Db Klik.jpg',
                        'CV Harsyad Utama (Harsyad Teknologi)' => 'Harsyad.jpg',
                        'DOT Indonesia' => 'dot.jpg',
                        'Humas POLINEMA' => 'polinema.jpg',
                        'Oyitok Group' => 'Oyi.jpg',
                        'Pengembangan Platform Satu Peta Jatim - Batch 2' => 'Peta.jpg',
                        'Pengembangan Platform Satu Peta Jatim - PT Link Apisindo Media & Dinas Kominfo Jatim' =>
                            'Peta.jpg',
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
                        'UPA Bahasa Polinema' => 'polinema.jpg',
                        'Wakil Direktur 4 Politeknik Negeri Malang' => 'polinema.jpg',
                    ];
                    $foto = $fotoPerusahaan[$company->name] ?? null;
                @endphp

                <div class="result-card">
                    <!-- CARD IMAGE -->
                    <div class="card-img">
                        @if ($foto)
                            <img src="{{ asset('img/perusahaan/' . $foto) }}" alt="{{ $company->name }}">
                        @else
                            <div class="img-placeholder">
                                <i class="fas fa-building"></i>
                            </div>
                        @endif
                        <!-- MATCH SCORE BUBBLE -->
                        <div class="match-bubble">
                            <div class="pct">{{ $finalScore }}%</div>
                            <div class="lbl">Match</div>
                        </div>
                    </div>

                    <div class="result-card-body">
                        <div class="result-header">
                            <div>
                                <h3>#{{ $result->ranking }} {{ $company->name }}</h3>
                                <p>{{ $company->posisi_magang }}</p>
                            </div>
                        </div>

                        <div class="company-info">
                            <p><strong>Tipe Industri:</strong> {{ $company->tipe_industri ?? '-' }}</p>
                            <p><strong>Status Magang:</strong> {{ $company->status_magang ?? '-' }}</p>
                            <p><strong>Minimal IPK:</strong> {{ $company->minimal_ipk ?? '-' }}</p>
                            <p><strong>Durasi:</strong> {{ $company->duration_months ?? '-' }} bulan</p>
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
                                    <div class="progress-bar" style="width: {{ $result->score_technology * 100 }}%">
                                    </div>
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

                        <a href="{{ route('detail.perusahaan', $company->id) }}" class="btn-detail">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- PAGINATION -->
        @if (method_exists($results, 'links'))
            <div class="pagination">
                {{ $results->links() }}
            </div>
        @endif

    </div>

</body>

</html>
