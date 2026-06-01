<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Rekomendasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

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

        /* RESULT INFO */
        .result-info {
            margin-bottom: 30px;
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
            padding: 22px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
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
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="brand">
            RekomIn
        </div>

        <div>
            <a href="{{ route('landing') }}">Home</a>
            <a href="{{ route('rekomendasi') }}">Perusahaan</a>
            <a href="{{ route('recommendation.index') }}">Start Rekomendasi</a>
        </div>

    </nav>

    <div class="content-wrap">

        <div class="page-title">
            Hasil Rekomendasi Magang
        </div>

        <div class="page-subtitle">
            Berikut perusahaan yang paling sesuai dengan profil dan minatmu.
        </div>

        <form method="GET" action="{{ route('recommendation.result') }}">

    <div class="filter-bar">

        {{-- Filter Status --}}
        <div class="filter-select-wrap">
            <select name="status_magang"
                class="filter-select"
                onchange="this.form.submit()">

                <option value="">Semua Status</option>

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

        {{-- Filter Kota --}}
        <div class="filter-select-wrap">
            <select name="kota"
                class="filter-select"
                onchange="this.form.submit()">

                <option value="">Semua Kota</option>

                @foreach($kotaList as $kota)
                    <option value="{{ $kota }}"
                        {{ request('kota') == $kota ? 'selected' : '' }}>
                        {{ $kota }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- Reset --}}
        <a href="{{ route('recommendation.result') }}"
            class="btn-reset-filter">
            Reset Filter
        </a>

    </div>

</form>



        <p class="result-info">
            Menampilkan
            <strong>{{ $results->count() }}</strong>
            hasil rekomendasi terbaik untukmu.
        </p>

        <div class="result-grid">

            @foreach ($results as $result)

                @php
                    $company = $result->perusahaan;
                @endphp

                <div class="result-card">

                    <div class="result-header">

                        <div>
                            <h3>
                                #{{ $result->ranking }}
                                {{ $company->name }}
                            </h3>

                            <p>
                                {{ $company->posisi_magang }}
                            </p>
                        </div>

                        <div class="score-box">
                            {{ number_format($result->final_score * 100, 1) }}%
                        </div>

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
                                <div class="progress-bar"
                                    style="width: {{ $result->score_skill * 100 }}%">
                                </div>
                            </div>

                        </div>

                        <div class="score-item">

                            <div class="score-top">
                                <span>Teknologi</span>
                                <span>{{ number_format($result->score_technology * 100, 0) }}%</span>
                            </div>

                            <div class="progress">
                                <div class="progress-bar"
                                    style="width: {{ $result->score_technology * 100 }}%">
                                </div>
                            </div>

                        </div>

                        <div class="score-item">

                            <div class="score-top">
                                <span>Minat</span>
                                <span>{{ number_format($result->score_minat * 100, 0) }}%</span>
                            </div>

                            <div class="progress">
                                <div class="progress-bar"
                                    style="width: {{ $result->score_minat * 100 }}%">
                                </div>
                            </div>

                        </div>

                        <div class="score-item">

                            <div class="score-top">
                                <span>IPK</span>
                                <span>{{ number_format($result->score_ipk * 100, 0) }}%</span>
                            </div>

                            <div class="progress">
                                <div class="progress-bar"
                                    style="width: {{ $result->score_ipk * 100 }}%">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="detail-section">

                        <a href="{{ route('detail.perusahaan', $company->id) }}"
                            class="btn-detail">
                            Lihat Detail →
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

</body>

</html>
