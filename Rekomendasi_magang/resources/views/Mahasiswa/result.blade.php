<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Rekomendasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6fb;
            margin: 0;
            color: #111827;
        }

        .navbar {
            background: #1a1a6e;
            padding: 18px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-weight: 600;
        }

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
        }

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
        }

        .result-header h3 {
            font-size: 18px;
            margin: 0 0 8px;
        }

        .result-header p {
            font-size: 14px;
            margin: 0;
            color: #4b5563;
        }

        .score-box {
            min-width: 62px;
            height: 62px;
            border-radius: 50%;
            background: #1a1a6e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
        }

        .company-info,
        .score-section,
        .detail-section {
            margin-top: 18px;
            font-size: 14px;
        }

        .company-info p {
            margin: 8px 0;
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

        .detail-section {
            border-top: 1px solid #e5e7eb;
            padding-top: 15px;
            line-height: 1.6;
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
                            <strong>Minimal IPK:</strong>
                            {{ $company->minimal_ipk ?? '-' }}
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

    </div>

</body>

</html>