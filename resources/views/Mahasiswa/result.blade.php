<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Rekomendasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/mahasiswa/result_page.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <button id="openUlasan" class="nav-btn">
                    Beri Ulasan
                </button>
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
                <select name="benefit" class="filter-select" onchange="this.form.submit()">

                    <option value="">Benefit</option>

                    @foreach ($benefitList as $benefit)
                        <option value="{{ $benefit }}" {{ request('benefit') == $benefit ? 'selected' : '' }}>
                            {{ $benefit }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Provinsi --}}
            <div class="filter-select-wrap">
                <select name="provinsi" class="filter-select" onchange="this.form.submit()">

                    <option value="">Provinsi</option>

                    @foreach ($provinsiList as $provinsi)
                        <option value="{{ $provinsi }}" {{ request('provinsi') == $provinsi ? 'selected' : '' }}>
                            {{ $provinsi }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Filter Kota --}}
            <div class="filter-select-wrap">
                <select name="kota" class="filter-select" onchange="this.form.submit()">

                    <option value="">Kota</option>

                    @foreach ($kotaList as $kota)
                        <option value="{{ $kota }}" {{ request('kota') == $kota ? 'selected' : '' }}>
                            {{ $kota }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Reset Filter --}}
            <a href="{{ route('recommendation.result') }}" class="btn-reset-filter">
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
                        @if ($company->logo)
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
                            @if ($company->minatBidang->count() > 0)
                                <p class="minat-tags">
                                    @foreach ($company->minatBidang as $posisi)
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

    <!-- Overlay -->
    <div id="ulasanOverlay" class="modal-overlay">

        <div class="modal-box">

            <div class="modal-header-custom">
                <h3>Beri Ulasan</h3>

                <button id="closeUlasan" class="close-btn">
                    &times;
                </button>
            </div>

            <form id="ulasanForm">

                @csrf

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Semester</label>
                    <input type="text" name="position" required>
                </div>

                <div class="form-group">
                    <label>Rating</label>

                    <div class="rating-box">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>

                        <input type="hidden" name="rating" id="rating" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Ulasan</label>

                    <textarea name="review" rows="4" required></textarea>
                </div>

                <input type="hidden" name="is_active" value="1">

                <button type="submit" class="btn-submit-ulasan">
                    Kirim Ulasan
                </button>

            </form>

        </div>

    </div>
    <script>
        // buka modal
        document.getElementById('openUlasan')
            .addEventListener('click', () => {

                document.getElementById('ulasanOverlay')
                    .classList.add('show');
            });

        // tutup modal
        document.getElementById('closeUlasan')
            .addEventListener('click', () => {

                document.getElementById('ulasanOverlay')
                    .classList.remove('show');
            });

        // klik area gelap tutup modal
        document.getElementById('ulasanOverlay')
            .addEventListener('click', function(e) {

                if (e.target === this) {
                    this.classList.remove('show');
                }
            });

        // rating bintang
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {

            star.addEventListener('click', function() {

                const value = this.dataset.value;

                ratingInput.value = value;

                stars.forEach(s => {
                    s.classList.remove('active');
                });

                stars.forEach(s => {

                    if (s.dataset.value <= value) {
                        s.classList.add('active');
                    }

                });

            });

        });

        document.getElementById('ulasanForm')
            .addEventListener('submit', async function(e) {

                e.preventDefault();

                let formData = new FormData(this);
                const submitBtn = this.querySelector('.btn-submit-ulasan');

                // Disable button saat submitting
                submitBtn.disabled = true;
                submitBtn.textContent = 'Mengirim...';

                try {
                    const response = await fetch(
                        "{{ route('system-review.store') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector(
                                    'meta[name="csrf-token"]'
                                ).content,
                                "Accept": "application/json"
                            },
                            body: formData
                        }
                    );

                    const result = await response.json();

                    if (result.success) {
                        // ✅ Alert Sukses
                        showCustomAlert('success', 'Berhasil Mengirim Ulasan!', result.message);

                        this.reset();
                        ratingInput.value = '';
                        stars.forEach(s => s.classList.remove('active'));

                        setTimeout(() => {
                            document.getElementById('ulasanOverlay').classList.remove('show');
                        }, 1500);
                    } else {
                        // ❌ Alert Gagal
                        showCustomAlert('error', 'Gagal Mengirim Ulasan', result.message);
                    }

                } catch (err) {
                    console.error(err);
                    showCustomAlert('error', 'Terjadi Kesalahan',
                        'Maaf, terjadi kesalahan pada server. Silakan coba lagi.');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Kirim Ulasan';
                }
            });

        // Fungsi custom alert yang lebih menarik
        function showCustomAlert(type, title, message) {
            const overlay = document.createElement('div');
            overlay.style.cssText = `
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 99999;
            `;

            const icon = type === 'success' ? '✓' : '✕';
            const bgColor = type === 'success' ? '#1a1a6e' : '#dc2626';
            const iconBg = type === 'success' ? '#dcfce7' : '#fee2e2';

            overlay.innerHTML = `
                <div class="custom-alert-box">
                    <div style="
                        width: 70px;
                        height: 70px;
                        border-radius: 50%;
                        background: ${iconBg};
                        color: ${bgColor};
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 32px;
                        font-weight: 800;
                        margin: 0 auto 20px;
                    ">${icon}</div>
                    
                    <h3 style="
                        font-size: 20px;
                        font-weight: 800;
                        color: #1a1a2e;
                        margin-bottom: 10px;
                    ">${title}</h3>
                    
                    <p style="
                        font-size: 14px;
                        color: #666;
                        line-height: 1.6;
                        margin-bottom: 25px;
                    ">${message}</p>
                    
                    <button onclick="this.closest('.custom-alert-overlay').remove()" style="
                        background: ${bgColor};
                        color: white;
                        border: none;
                        padding: 12px 30px;
                        border-radius: 10px;
                        font-weight: 700;
                        font-size: 14px;
                        cursor: pointer;
                    ">Tutup</button>
                </div>
            `;

            overlay.classList.add('custom-alert-overlay');
            document.body.appendChild(overlay);

            // Auto close setelah 5 detik untuk success
            if (type === 'success') {
                setTimeout(() => overlay.remove(), 5000);
            }
        }
    </script>
</body>

</html>
