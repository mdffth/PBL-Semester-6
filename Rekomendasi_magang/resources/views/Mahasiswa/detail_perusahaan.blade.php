<!-- resources/views/mahasiswa/detail_perusahaan.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Perusahaan</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body{
            background: #F5F7FB;
            color: #1E1E1E;
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
        /* CONTAINER */
        .container{
            width: 95%;
            margin: 30px auto;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        /* LEFT */
        .card{
            background: white;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .company-image{
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 12px;
        }

        .company-header{
            margin-top: 20px;
        }

        .company-title{
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .company-badge{
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 12px;
        }

        .badge{
            background: #EEF3FF;
            color: #0242C4;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .section-title{
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            border-left: 5px solid #0242C4;
            padding-left: 12px;
        }

        .description{
            color: #555;
            line-height: 1.8;
            font-size: 16px;
            white-space: pre-line;
        }

        .responsibility-list{
            margin-top: 20px;
            padding-left: 20px;
        }

        .responsibility-list li{
            margin-bottom: 15px;
            color: #444;
            line-height: 1.6;
        }

        /* RIGHT */
        .sidebar-card{
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .sidebar-title{
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .info-group{
            margin-bottom: 22px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .info-group:last-child{
            border-bottom: none;
        }

        .info-label{
            font-size: 12px;
            color: #7C8299;
            margin-bottom: 8px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .info-value{
            font-size: 15px;
            color: #333;
            font-weight: 500;
            line-height: 1.6;
        }

        .tag-container{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .tag{
            background: #EEF3FF;
            color: #0242C4;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        .apply-btn{
            width: 100%;
            background: #0242C4;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        .apply-btn:hover{
            background: #0136A0;
        }

        .help-box{
            background: #0F172A;
            color: white;
        }

        .help-box p{
            margin-top: 10px;
            color: #D1D5DB;
            font-size: 14px;
            line-height: 1.7;
        }

        /* footer{
            background: white;
            padding: 30px 50px;
            margin-top: 50px;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        footer h3{
            color: #0242C4;
            margin-bottom: 10px;
        }

        footer p,
        footer a{
            color: #7C8299;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-links{
            display: flex;
            gap: 20px;
        } */

        @media(max-width: 992px){
            .container{
                grid-template-columns: 1fr;
            }

            .company-title{
                font-size: 30px;
            }

            .section-title{
                font-size: 24px;
            }

            .sidebar-title{
                font-size: 22px;
            }

            .navbar{
                flex-direction: column;
                gap: 15px;
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
                <img
                    src="{{ $perusahaan->logo ? asset($perusahaan->logo) : asset('images/reka.png') }}"
                    class="company-image"
                >

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

                <div class="section-title"
                     style="margin-top:35px; font-size:24px;">

                    Informasi Magang

                </div>

                <ul class="responsibility-list">

                    <li>
                        <strong>Posisi Magang :</strong>
                        {{ $perusahaan->posisi_magang ?? '-' }}
                    </li>

                    <li>
                        <strong>Minimal IPK :</strong>
                        {{ $perusahaan->min_ipk ?? '-' }}
                    </li>

                    <li>
                        <strong>Durasi Magang :</strong>
                        {{ $perusahaan->duration_months ?? '-' }}
                    </li>

                    <li>
                        <strong>Status Magang :</strong>
                        {{ $perusahaan->status_magang ?? '-' }}
                    </li>

                </ul>

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
                        {{ $perusahaan->posisi_magang ?? '-' }}
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
                        Status Magang
                    </div>

                    <div class="info-value">
                        {{ $perusahaan->status_magang ?? '-' }}
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

                @php
                    $googleFormBase = 'https://docs.google.com/forms/d/e/1FAIpQLScVNUm4Nit-0VnPf7CbuzrDDEAL2nr2mL9IhYSQjNeeTA06tw/viewform?usp=pp_url';
                    $entryPerusahaan = 'entry.600353513'; // ganti dengan entry dari Google Form kamu
                @endphp

                <a href="{{ $googleFormBase }}&{{ $entryPerusahaan }}={{ urlencode($perusahaan->name) }}"
                target="_blank"
                class="apply-btn"
                style="display:block; text-align:center; text-decoration:none;">
                    Daftar / Apply →
                </a>

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