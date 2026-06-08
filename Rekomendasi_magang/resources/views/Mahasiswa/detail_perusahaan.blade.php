<!-- resources/views/mahasiswa/detail_perusahaan.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Perusahaan</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/mahasiswa/detail_perusahaan.css') }}">

</head>

<body>

    <!-- NAVBAR -->
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
            <!-- @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                                <li>
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                                    >
                                        Dashboard
                                    </a>
                                </li>
@else
    <li>
                                    <a
                                        href="{{ route('login') }}"
                                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                                    >
                                        Log in
                                    </a>
                                </li>
                                    @if (Route::has('register'))
    <li>
                                        <a
                                            href="{{ route('register') }}"
                                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                            Register
                                        </a>
                                    </li>
    @endif
                    @endauth
                </nav>
            @endif -->
            {{-- <li><div class="nav-avatar"><i class="fas fa-user"></i></div></li> --}}
        </ul>
    </nav>

    <!-- CONTENT -->
    <div class="container">

        <!-- LEFT -->
        <div>

            <!-- IMAGE -->
            <div class="card">

                {{-- LOGO DINAMIS --}}
                <img src="{{ $perusahaan->logo ? asset($perusahaan->logo) : asset('images/reka.png') }}"
                    class="company-image">

                <div class="company-header">

                    <div class="company-title">
                        {{ $perusahaan->name }}
                    </div>

                    <div class="company-badge">

                        <div class="badge">
                            🏢 {{ $perusahaan->tipe_industri ?? '-' }}
                        </div>

                        <div class="badge">
                            📍
                            {{ $perusahaan->kota ?? '-' }},
                            {{ $perusahaan->provinsi ?? '-' }}
                        </div>

                        <div class="badge">
                            💼 {{ $perusahaan->status_magang ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>

            <!-- PROFILE -->
            <div class="card">

                <div class="section-title">
                    Profil Perusahaan
                </div>

                <div class="description">
                    {{ $perusahaan->profile_perusahaan ?? '-' }}
                </div>

            </div>

            <!-- JOB DESCRIPTION -->
            <div class="card">

                <div class="section-title">
                    Detailed Job Description
                </div>

                <div class="description">
                    {{ $perusahaan->job_description ?? '-' }}
                </div>

                <div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div>

            <div class="sidebar-card">

                <div class="sidebar-title">
                    Internship Details
                </div>

                <div class="info-group">

                    <div class="info-label">
                        Lokasi
                    </div>

                    <div class="info-value">

                        {{ $perusahaan->alamat ?? '-' }},
                        {{ $perusahaan->kota ?? '-' }},
                        {{ $perusahaan->provinsi ?? '-' }}

                    </div>

                </div>

                <div class="info-group">

                    <div class="info-label">
                        Tipe Industri
                    </div>

                    <div class="info-value">
                        {{ $perusahaan->tipe_industri ?? '-' }}
                    </div>

                </div>

                <div class="info-group">

                    <div class="info-label">
                        Posisi Magang
                    </div>

                    <div class="info-value">
                        @forelse($perusahaan->minatBidang as $posisi)
                            {{ $posisi->name }}@if (!$loop->last)
                                /
                            @endif
                            @empty
                                Belum ada skill
                            @endforelse
                        </div>

                    </div>

                    <div class="info-group">

                        <div class="info-label">
                            Minimal IPK
                        </div>

                        <div class="info-value">
                            {{ $perusahaan->min_ipk ?? '-' }}
                        </div>

                    </div>

                    <div class="info-group">

                        <div class="info-label">
                            Durasi Magang
                        </div>

                        <div class="info-value">
                            {{ $perusahaan->duration_months ?? '-' }}
                        </div>

                    </div>

                    <div class="info-group">

                        <div class="info-label">
                            Benefit Magang
                        </div>

                        <div class="info-value">
                            {{ $perusahaan->benefit ?? '-' }}
                        </div>

                    </div>

                    <!-- SKILLS -->
                    <div class="info-group">

                        <div class="info-label">
                            Required Skills
                        </div>

                        <div class="tag-container">

                            @forelse($perusahaan->skills as $skill)
                                <div class="tag">
                                    {{ $skill->name }}
                                </div>

                            @empty

                                <div class="tag">
                                    Belum ada skill
                                </div>
                            @endforelse

                        </div>

                    </div>

                    <!-- TECHNOLOGIES -->
                    <div class="info-group">

                        <div class="info-label">
                            Technologies
                        </div>

                        <div class="tag-container">

                            @forelse($perusahaan->technologies as $tech)
                                <div class="tag">
                                    {{ $tech->name }}
                                </div>

                            @empty

                                <div class="tag">
                                    Belum ada teknologi
                                </div>
                            @endforelse

                        </div>

                    </div>

                    <button class="apply-btn">
                        Daftar / Apply →
                    </button>

                </div>

                <div class="sidebar-card help-box">

                    <h3>
                        Need Help?
                    </h3>

                    <p>
                        Contact our talent acquisition team if you have
                        questions about this role or the application process.
                    </p>

                    <p>
                        Visit Help Center
                    </p>

                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <footer style="background:#1a1a2e; padding:1.5rem 5%; text-align:center; margin-top:3rem;">
            <p style="font-size:.85rem; color:rgba(255,255,255,0.5);">
                &copy; {{ date('Y') }} RekomIn — Platform Rekomendasi Magang Mahasiswa.
            </p>
        </footer>

    </body>

    </html>
