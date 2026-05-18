<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RekomIn - Rekomendasi Magang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            400: '#8b8bff',
                            600: '#3b3bdb',
                            700: '#2d2db8',
                            800: '#1a1a6e',
                            900: '#12124a',
                        },
                        success: {
                            50: '#ecfdf5',
                            200: '#a7f3d0',
                            600: '#059669',
                            700: '#047857',
                        },
                        dark: {
                            100: '#f1f1f8',
                            300: '#c0c0d0',
                            400: '#8888a0',
                            500: '#666680',
                            600: '#555570',
                            800: '#2a2a40',
                            900: '#1a1a2e',
                        }
                    },
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: #f4f6fb; color: #1a1a2e; }

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

        /* HERO */
        .hero { background: linear-gradient(135deg, #3b3bdb 0%, #2d2db8 60%, #3b3bdb 100%); padding: 5rem 5% 4rem; min-height: 88vh; display: flex; align-items: center; }
        .hero-inner { display: flex; align-items: center; justify-content: space-between; gap: 3rem; width: 100%; max-width: 1200px; margin: 0 auto; }
        .hero-left { flex: 1; }
        .hero-left h1 { font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; color: #fff; line-height: 1.2; margin-bottom: 1.2rem; }
        .hero-left h1 span { color: #7eb8ff; }
        .hero-left p { color: rgba(255,255,255,0.8); font-size: .98rem; line-height: 1.75; margin-bottom: 2rem; max-width: 480px; }
        .btn-hero { display: inline-block; background: #3b3bdb; color: #fff; padding: .85rem 2rem; border-radius: 10px; font-weight: 700; text-decoration: none; font-size: 1rem; transition: all .2s; box-shadow: 0 4px 20px rgba(59,59,219,0.4); }
        .btn-hero:hover { background: #2d2db8; transform: translateY(-2px); }
        .hero-right { flex: 1; display: flex; justify-content: center; }
        .hero-card-demo { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; padding: 2rem; width: 340px; }
        .demo-header { display: flex; align-items: center; gap: .8rem; margin-bottom: 1.5rem; }
        .demo-avatar { width: 44px; height: 44px; background: #3b3bdb; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; }
        .demo-title { color: #fff; font-weight: 700; font-size: .95rem; }
        .demo-sub { color: rgba(255,255,255,0.6); font-size: .78rem; }
        .demo-match { text-align: center; margin-bottom: 1.5rem; }
        .match-circle { width: 90px; height: 90px; background: #3b3bdb; border-radius: 50%; display: flex; flex-direction: column; align-items: center; justify-content: center; margin: 0 auto .5rem; border: 3px solid rgba(255,255,255,0.3); }
        .match-pct { color: #fff; font-size: 1.4rem; font-weight: 800; }
        .match-lbl { color: rgba(255,255,255,0.7); font-size: .65rem; }
        .match-name { color: #fff; font-weight: 700; font-size: .9rem; }
        .match-type { color: rgba(255,255,255,0.6); font-size: .78rem; }
        .demo-list { display: flex; flex-direction: column; gap: .6rem; }
        .demo-item { background: rgba(255,255,255,0.1); border-radius: 8px; padding: .6rem .8rem; display: flex; justify-content: space-between; align-items: center; }
        .demo-item-name { color: #fff; font-size: .8rem; font-weight: 600; }
        .demo-item-pct { color: #7eb8ff; font-size: .8rem; font-weight: 700; }

        /* SECTION */
        section { padding: 5rem 5%; }
        .sec-title { font-size: clamp(1.5rem, 2.5vw, 2rem); font-weight: 800; color: #1a1a2e; margin-bottom: .5rem; }
        .sec-sub { color: #666; font-size: .93rem; line-height: 1.65; }

        /* LANGKAH */
        #langkah { background: #fff; }
        .langkah-header { text-align: center; margin-bottom: 2.5rem; }
        .langkah-header h2 { font-size: clamp(1.5rem, 2.5vw, 2rem); font-weight: 800; color: #1a1a2e; margin-bottom: .5rem; }
        .langkah-header p { color: #666; font-size: .93rem; }
        .langkah-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 2rem; }
        .langkah-card { background: #fff; border-radius: 16px; padding: 2rem 1.5rem; color: #1a1a2e; border: 1.5px solid #e8e8f0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); transition: all .25s; }
        .langkah-card:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(26,26,110,0.08); border-color: #c7c7ff; }
        .langkah-icon { width: 48px; height: 48px; background: #eef0fb; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; color: #3b3bdb; margin-bottom: 1.2rem; }
        .langkah-card h3 { font-size: 1.05rem; font-weight: 700; color: #1a1a2e; margin-bottom: .6rem; }
        .langkah-card p { font-size: .85rem; color: #666; line-height: 1.65; }          

        /* PERUSAHAAN */
        #perusahaan { background: #fff; }
        .perusahaan-header { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem; }
        .btn-lihat-semua { background: #1a1a6e; color: #fff; padding: .6rem 1.4rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: .88rem; transition: background .2s; }
        .btn-lihat-semua:hover { background: #2d2db8; }
        .perusahaan-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
        .p-card { background: #fff; border-radius: 16px; overflow: hidden; border: 1.5px solid #e8e8f0; transition: all .25s; box-shadow: 0 2px 12px rgba(0,0,0,0.05); }
        .p-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(26,26,110,0.12); border-color: #3b3bdb; }
        .p-card-img { 
            width: 100%; 
            height: 160px; 
            background: linear-gradient(135deg, #1a1a6e, #3b3bdb); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 3rem; 
            color: rgba(255,255,255,0.4); 
            overflow: hidden;
            position: relative;
        }
        .p-card-img img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            object-position: center;
            display: block;
        }
        /* Samakan tinggi kartu & dorong tombol ke bawah */
        .p-card { display: flex; flex-direction: column; }
        .p-card-body { display: flex; flex-direction: column; flex: 1; padding: 1.2rem; }
        .p-card-desc { flex: 1; font-size: .8rem; color: #666; line-height: 1.55; margin-bottom: 1rem; }
        .p-card-name { font-size: .95rem; font-weight: 700; color: #1a1a2e; margin-bottom: .5rem; }
        .p-card-badges { display: flex; flex-wrap: wrap; gap: .35rem; margin-bottom: .7rem; }
        .badge { padding: .2rem .65rem; border-radius: 20px; font-size: .72rem; font-weight: 600; }
        .b-blue { background: #e0e0ff; color: #1a1a6e; }
        .b-green { background: #d1fae5; color: #065f46; }
        .b-red { background: #fee2e2; color: #991b1b; }
        .b-orange { background: #fff3e0; color: #b45309; }
        .p-card-desc { font-size: .8rem; color: #666; line-height: 1.55; margin-bottom: 1rem; }
        .btn-detail { display: block; text-align: center; background: #1a1a6e; color: #fff; padding: .6rem; border-radius: 8px; text-decoration: none; font-size: .85rem; font-weight: 600; transition: background .2s; }
        .btn-detail:hover { background: #2d2db8; }

        /* Testimonial star rating shimmer */
        @keyframes starPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        @media(max-width: 900px) {
            .hero-right { display: none; }
            .langkah-grid, .perusahaan-grid { grid-template-columns: 1fr 1fr; }
        }
        @media(max-width: 600px) {
            .langkah-grid, .perusahaan-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body class="font-inter">

<!-- NAVBAR -->
<nav class="navbar">
    <a href="/" class="navbar-brand">
        <div class="brand-logo">RI</div>
        <span class="brand-name">RekomIn</span>
    </a>
    <ul class="nav-links">
        <li><a href="/" class="active">Home</a></li>
        <li><a href="#perusahaan">Perusahaan</a></li>
        <li><a href="{{ route('rekomendasi') }}" class="nav-btn">Start Rekomendasi</a></li>
        {{-- <li><div class="nav-avatar"><i class="fas fa-user"></i></div></li> --}}
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-inner">
        <div class="hero-left">
            <h1>Welcome to<br><span>RekomIn!</span></h1>
            <p>Sistem berbasis data untuk membantu mahasiswa untuk memilih tempat magang yang tepat berdasarkan portofolio, minat, dan kebutuhan industri terkini</p>
            <a href="{{ route('rekomendasi') }}" class="btn-hero">Start Rekomendasi</a>
            <a href="#langkah" class="btn-hero" style="background:#fff; color:#1a1a2e; border:1.5px solid #d0d0e8; box-shadow:none; margin-left:.8rem;">Pelajari Sistem</a>
        </div>
        {{-- <div class="hero-right">
            <div class="hero-card-demo">
                <div class="demo-header">
                    <div class="demo-avatar">M</div>
                    <div>
                        <div class="demo-title">Rekomendasi Untukmu</div>
                        <div class="demo-sub">Berdasarkan profil akademikmu</div>
                    </div>
                </div>
                <div class="demo-match">
                    <div class="match-circle">
                        <div class="match-pct">98%</div>
                        <div class="match-lbl">Match</div>
                    </div>
                    <div class="match-name">PT Indoprima Gemilang</div>
                    <div class="match-type">IT System Development</div>
                </div>
                <div class="demo-list">
                    <div class="demo-item">
                        <span class="demo-item-name">PT ARM Solusi</span>
                        <span class="demo-item-pct">95%</span>
                    </div>
                    <div class="demo-item">
                        <span class="demo-item-name">PT Link Apisindo</span>
                        <span class="demo-item-pct">90%</span>
                    </div>
                    <div class="demo-item">
                        <span class="demo-item-name">Sarastya Innovations</span>
                        <span class="demo-item-pct">87%</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>

<!-- LANGKAH-LANGKAH -->
<section id="langkah">
    <div class="langkah-header">
        <h2>Cara Kerja</h2>
        <p>Tiga langkah mudah untuk mendapatkan karier impian melalui sistem kurasi data kami yang canggih.</p>
    </div>
    <div class="langkah-grid">
        <div class="langkah-card">
            <div class="langkah-icon"><i class="fas fa-user-edit"></i></div>
            <h3>Isi Data Diri</h3>
            <p>Lengkapi profil akademik Anda mulai dari IPK, keahlian teknis, tools yang dikuasai, hingga minat karir Anda.</p>
        </div>
        <div class="langkah-card">
            <div class="langkah-icon"><i class="fas fa-chart-line"></i></div>
            <h3>Sistem Menganalisis</h3>
            <p>Algoritma kami mencocokkan profil Anda dengan ribuan kriteria dari mitra perusahaan yang tersedia.</p>
        </div>
        <div class="langkah-card">
            <div class="langkah-icon"><i class="fas fa-check-circle"></i></div>
            <h3>Dapatkan Rekomendasi</h3>
            <p>Terima daftar magang yang paling sesuai dengan profil Anda lengkap dengan skor kecocokan.</p>
        </div>
    </div>
</section>

<!-- PERUSAHAAN -->
<section id="perusahaan">
    <div class="perusahaan-header">
        <div>
            <h2 class="sec-title">Perusahaan</h2>
            <p class="sec-sub">Daftar perusahaan yang tersedia untuk tempat magang.</p>
        </div>
        <a href="{{ route('rekomendasi') }}" class="btn-lihat-semua">Lihat Semua</a>
    </div>
            <div class="perusahaan-grid">
                @forelse($perusahaanList ?? [] as $p)
                <div class="p-card">
                    <div class="p-card-img">
            @if($loop->index == 0)
                <img src="{{ asset('img/perusahaan/PT Indo.jpg') }}" alt="{{ $p->name }}">
            @elseif($loop->index == 1)
                <img src="{{ asset('img/perusahaan/DLH.jpg') }}" alt="{{ $p->name }}">
            @elseif($loop->index == 2)
                <img src="{{ asset('img/perusahaan/Peta.jpg') }}" alt="{{ $p->name }}">
            @elseif($loop->index == 3)
                <img src="{{ asset('img/perusahaan/ARM.jpg') }}" alt="{{ $p->name }}">
            @elseif($loop->index == 4)
                <img src="{{ asset('img/perusahaan/Peta.jpg') }}" alt="{{ $p->name }}">
            @elseif($loop->index == 5)
                <img src="{{ asset('img/perusahaan/Sarastya.jpg') }}" alt="{{ $p->name }}">
            @else
                <i class="fas fa-building"></i>
            @endif
        </div>
            <div class="p-card-body">
                <div class="p-card-name">{{ $p->name }}</div>
                <div class="p-card-badges">
                    @foreach(array_slice(explode(' / ', $p->posisi_magang), 0, 2) as $pos)
                        <span class="badge b-blue">{{ trim($pos) }}</span>
                    @endforeach
                    <span class="badge {{ $p->status_magang === 'Paid' ? 'b-green' : 'b-red' }}">{{ $p->status_magang }}</span>
                </div>
                <p class="p-card-desc">{{ Str::limit($p->profile_perusahaan ?? $p->job_description, 90) }}</p>
                <a href="{{ route('rekomendasi') }}" class="btn-detail">Lihat Detail</a>
            </div>
        </div>
        @empty
        <div class="p-card">
            <div class="p-card-img"><i class="fas fa-building"></i></div>
            <div class="p-card-body">
                <div class="p-card-name">PT Indoprima Gemilang</div>
                <div class="p-card-badges"><span class="badge b-blue">IT Engineer</span><span class="badge b-green">Paid</span></div>
                <p class="p-card-desc">Perusahaan manufaktur komponen otomotif yang membuka kesempatan magang di bidang IT.</p>
                <a href="{{ route('rekomendasi') }}" class="btn-detail">Lihat Detail</a>
            </div>
        </div>
        @endforelse
    </div>
</section>
<!-- ========== TESTIMONIALS ========== -->
<section id="testimonials" class="py-16 lg:py-24 px-[5%] bg-[#f4f6fb]">
  <div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="text-center max-w-3xl mx-auto mb-10">
      <h2 class="text-3xl lg:text-4xl font-extrabold text-dark-900 mb-4">
        Apa Kata <span class="text-primary-600">Mereka</span>?
      </h2>
      <p class="text-base text-dark-500">Mahasiswa yang sudah menemukan magang impian mereka melalui RekomIn.</p>
    </div>

    <!-- Carousel: tombol kiri | track | tombol kanan -->
    <div class="flex items-center gap-3">

      <!-- Tombol Kiri -->
      <button id="testi-prev"
        class="flex-shrink-0 w-10 h-10 rounded-xl border border-dark-100 bg-white hover:bg-dark-100 flex items-center justify-center transition-colors disabled:opacity-25"
        aria-label="Sebelumnya">
        <i class="fas fa-arrow-left text-sm text-dark-600"></i>
      </button>

      <!-- Track Outer (overflow hidden) -->
      <div id="testi-outer" class="overflow-hidden flex-1">
        <div id="testi-track" class="flex gap-6" style="transition: transform 0.4s cubic-bezier(.4,0,.2,1);">

          <!-- Card 1: Daffa -->
          <div class="flex-none w-80 bg-white rounded-2xl p-6 border border-dark-100">
            <div class="flex gap-1 mb-4">⭐⭐⭐⭐⭐</div>
            <p class="text-sm text-dark-600 leading-relaxed mb-6">"Saya merasa sangat terbantu dengan RekomIn. Platform ini membantu saya menemukan tempat magang yang sesuai dengan skill dan minat saya."</p>
            <div class="flex items-center gap-3 pt-4 border-t border-dark-100">
              <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-800 flex items-center justify-center font-bold">D</div>
              <div><p class="text-sm font-bold text-dark-800">Daffa</p><p class="text-xs text-dark-400">Magang di PT ARM Solusi</p></div>
            </div>
          </div>

          <!-- Card 2: Isna -->
          <div class="flex-none w-80 bg-white rounded-2xl p-6 border border-dark-100">
            <div class="flex gap-1 mb-4">⭐⭐⭐⭐⭐</div>
            <p class="text-sm text-dark-600 leading-relaxed mb-6">"Fitur rekomendasinya akurat banget! Tidak perlu bingung pilih tempat magang karena sistem langsung mencarikan yang paling cocok untuk saya."</p>
            <div class="flex items-center gap-3 pt-4 border-t border-dark-100">
              <div class="w-10 h-10 rounded-full bg-green-100 text-green-800 flex items-center justify-center font-bold">I</div>
              <div><p class="text-sm font-bold text-dark-800">Isna</p><p class="text-xs text-dark-400">Magang di PT Link Apisindo</p></div>
            </div>
          </div>

          <!-- Card 3: Zaki -->
          <div class="flex-none w-80 bg-white rounded-2xl p-6 border border-dark-100">
            <div class="flex gap-1 mb-4">⭐⭐⭐⭐</div>
            <p class="text-sm text-dark-600 leading-relaxed mb-6">"Tampilan webnya bersih dan mudah digunakan. Informasi perusahaan lengkap, mulai dari posisi sampai info uang saku. Sangat recommended!"</p>
            <div class="flex items-center gap-3 pt-4 border-t border-dark-100">
              <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-800 flex items-center justify-center font-bold">Z</div>
              <div><p class="text-sm font-bold text-dark-800">Zaki</p><p class="text-xs text-dark-400">Magang di Dinas Kominfo Jatim</p></div>
            </div>
          </div>

          <!-- Card 4: Rara -->
          <div class="flex-none w-80 bg-white rounded-2xl p-6 border border-dark-100">
            <div class="flex gap-1 mb-4">⭐⭐⭐⭐⭐</div>
            <p class="text-sm text-dark-600 leading-relaxed mb-6">"Awalnya bingung mau magang di mana, tapi setelah isi form di RekomIn langsung dapet 5 rekomendasi relevan. Proses seleksinya jadi lebih terarah!"</p>
            <div class="flex items-center gap-3 pt-4 border-t border-dark-100">
              <div class="w-10 h-10 rounded-full bg-red-100 text-red-800 flex items-center justify-center font-bold">R</div>
              <div><p class="text-sm font-bold text-dark-800">Rara</p><p class="text-xs text-dark-400">Magang di Sarastya Innovations</p></div>
            </div>
          </div>

          <!-- Card 5: Faiz -->
          <div class="flex-none w-80 bg-white rounded-2xl p-6 border border-dark-100">
            <div class="flex gap-1 mb-4">⭐⭐⭐⭐⭐</div>
            <p class="text-sm text-dark-600 leading-relaxed mb-6">"Skor kesesuaiannya membantu banget buat nentuin prioritas. Saya pilih yang 95% match dan ternyata emang cocok banget sama ritme kerja saya."</p>
            <div class="flex items-center gap-3 pt-4 border-t border-dark-100">
              <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center font-bold">F</div>
              <div><p class="text-sm font-bold text-dark-800">Faiz</p><p class="text-xs text-dark-400">Magang di Timedoor Academy</p></div>
            </div>
          </div>

          <!-- Card 6: Nadia -->
          <div class="flex-none w-80 bg-white rounded-2xl p-6 border border-dark-100">
            <div class="flex gap-1 mb-4">⭐⭐⭐⭐</div>
            <p class="text-sm text-dark-600 leading-relaxed mb-6">"Enak banget bisa lihat status paid/unpaid langsung di kartu perusahaan. Ga perlu riset satu-satu. Hemat waktu dan langsung bisa fokus apply!"</p>
            <div class="flex items-center gap-3 pt-4 border-t border-dark-100">
              <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold">N</div>
              <div><p class="text-sm font-bold text-dark-800">Nadia</p><p class="text-xs text-dark-400">Magang di PT Indoprima Gemilang</p></div>
            </div>
          </div>

          <!-- Card 7: Aldi -->
          <div class="flex-none w-80 bg-white rounded-2xl p-6 border border-dark-100">
            <div class="flex gap-1 mb-4">⭐⭐⭐⭐⭐</div>
            <p class="text-sm text-dark-600 leading-relaxed mb-6">"Sistem ini membantu saya yang masih semester 5 buat tahu perusahaan mana yang cocok sama IPK dan skill saya. Jadi lebih percaya diri waktu apply!"</p>
            <div class="flex items-center gap-3 pt-4 border-t border-dark-100">
              <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-800 flex items-center justify-center font-bold">A</div>
              <div><p class="text-sm font-bold text-dark-800">Aldi</p><p class="text-xs text-dark-400">Magang di DLH Kota Surabaya</p></div>
            </div>
          </div>

        </div><!-- end testi-track -->
      </div><!-- end testi-outer -->

      <!-- Tombol Kanan -->
      <button id="testi-next"
        class="flex-shrink-0 w-10 h-10 rounded-xl border border-dark-100 bg-white hover:bg-dark-100 flex items-center justify-center transition-colors disabled:opacity-25"
        aria-label="Berikutnya">
        <i class="fas fa-arrow-right text-sm text-dark-600"></i>
      </button>

    </div><!-- end flex wrapper -->

    <!-- Dots -->
    <div id="testi-dots" class="flex justify-center gap-2 mt-5"></div>

  </div>
</section>

<script>
  (function () {
    const track   = document.getElementById('testi-track');
    const prevBtn = document.getElementById('testi-prev');
    const nextBtn = document.getElementById('testi-next');
    const dotsEl  = document.getElementById('testi-dots');
    const cards   = track.querySelectorAll('.flex-none');
    const VISIBLE = window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ? 2 : 3;
    const pages   = cards.length - VISIBLE + 1;
    let current   = 0;

    function cardWidth() { return cards[0].offsetWidth + 24; }

    function goTo(idx) {
      current = Math.max(0, Math.min(idx, pages - 1));
      track.style.transform = `translateX(-${current * cardWidth()}px)`;
      prevBtn.disabled = current === 0;
      nextBtn.disabled = current >= pages - 1;
      dotsEl.querySelectorAll('button').forEach((d, i) => {
        d.style.background = i === current ? '#1a1a6e' : '#c0c0d0';
        d.style.width      = i === current ? '20px'   : '8px';
      });
    }

    for (let i = 0; i < pages; i++) {
      const b = document.createElement('button');
      b.style.cssText = 'height:8px;width:8px;border-radius:4px;border:none;background:#c0c0d0;cursor:pointer;transition:all .2s;padding:0;';
      b.addEventListener('click', () => goTo(i));
      dotsEl.appendChild(b);
    }

    prevBtn.addEventListener('click', () => goTo(current - 1));
    nextBtn.addEventListener('click', () => goTo(current + 1));

    let sx = 0;
    track.addEventListener('touchstart', e => sx = e.touches[0].clientX);
    track.addEventListener('touchend', e => {
      if (Math.abs(sx - e.changedTouches[0].clientX) > 40)
        goTo(current + (sx > e.changedTouches[0].clientX ? 1 : -1));
    });

    goTo(0);
    window.addEventListener('resize', () => goTo(current));
  })();
</script>

<!-- ========== FOOTER ========== -->
<footer class="bg-dark-900 text-dark-300 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-[5%] sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 lg:gap-12 mb-12">
            <!-- Brand -->
            <div class="col-span-2 md:col-span-4 lg:col-span-2">
                <a href="/" class="flex items-center gap-2 mb-4">
                    <div class="w-9 h-9 bg-primary-600 rounded-xl flex items-center justify-center">
                        <i data-lucide="briefcase" class="w-5 h-5 text-white"></i>
                    </div>
                    <span class="text-xl font-bold text-white">Rekom<span class="text-primary-400">In</span></span>
                </a>
                <p class="text-sm text-dark-400 leading-relaxed max-w-sm mb-6">Platform rekomendasi magang terbaik di Indonesia. Temukan pengalaman magang yang sesuai dengan minat dan skillmu.</p>
                <div class="flex items-center gap-3">
                    <a href="#" aria-label="Instagram"
                    class="w-10 h-10 bg-dark-800 rounded-xl flex items-center justify-center transition-colors hover:bg-[#e1306c]">
                        <i class="fab fa-instagram text-white text-base"></i>
                    </a>
                    <a href="#" aria-label="Twitter / X"
                    class="w-10 h-10 bg-dark-800 rounded-xl flex items-center justify-center transition-colors hover:bg-[#1da1f2]">
                        <i class="fab fa-x-twitter text-white text-base"></i>
                    </a>
                    <a href="#" aria-label="LinkedIn"
                    class="w-10 h-10 bg-dark-800 rounded-xl flex items-center justify-center transition-colors hover:bg-[#0a66c2]">
                        <i class="fab fa-linkedin-in text-white text-base"></i>
                    </a>
                    <a href="#" aria-label="GitHub"
                    class="w-10 h-10 bg-dark-800 rounded-xl flex items-center justify-center transition-colors hover:bg-[#6e40c9]">
                        <i class="fab fa-github text-white text-base"></i>
                    </a>
                </div>
            </div>

            
            <!-- Links 1 -->
            <div>
                <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-wider">Menu</h4>
                <ul class="space-y-3">
                    <li><a href="#perusahaan" class="text-sm text-dark-400 hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('rekomendasi') }}" class="text-sm text-dark-400 hover:text-white transition-colors">Perusahaan</a></li>
                    <li><a href="#" class="text-sm text-dark-400 hover:text-white transition-colors">Tentang Kami</a></li>
                </ul>
            </div>
            <!-- Links 2 -->
            <div>
                <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-wider">Bantuan</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-dark-400 hover:text-white transition-colors">Help Center</a></li>
                    <li><a href="#" class="text-sm text-dark-400 hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="text-sm text-dark-400 hover:text-white transition-colors">Community</a></li>
                </ul>
            </div>
            <!-- Links 3 -->
            <div>
                <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-wider">Kontak</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-dark-400 hover:text-white transition-colors">Gedung Inovasi Lt. 3, Jakarta Selatan,Indonesia</a></li>
                    <li><a href="#" class="text-sm text-dark-400 hover:text-white transition-colors">Kelompok_3_PBL@internpath.com</a></li>
                    <li><a href="#" class="text-sm text-dark-400 hover:text-white transition-colors">+62 812 3456 7890</a></li>
                </ul>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="border-t border-dark-800 pt-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-dark-400 text-center w-full">&copy; {{ date('Y') }} RekomIn — Platform Rekomendasi Magang Mahasiswa.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', function(e) {
            e.preventDefault();
            const t = document.querySelector(this.getAttribute('href'));
            if(t) t.scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>
</body>
</html>