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

                    {{-- GAMBAR PERUSAHAAN --}}
                    <div class="company-img">
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}">
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

</body>

</html>