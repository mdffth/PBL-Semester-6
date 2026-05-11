<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RekomIntern - Rekomendasi Magang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        .hero { background: linear-gradient(135deg, #1a1a6e 0%, #2d2db8 60%, #3b3bdb 100%); padding: 5rem 5% 4rem; min-height: 88vh; display: flex; align-items: center; }
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
        #langkah { background: #eef0fb; }
        .langkah-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 2rem; }
        .langkah-card { background: #1a1a6e; border-radius: 16px; padding: 2rem 1.5rem; text-align: center; color: #fff; position: relative; overflow: hidden; }
        .langkah-num { position: absolute; top: 1rem; right: 1.2rem; font-size: 3rem; font-weight: 900; color: rgba(255,255,255,0.08); line-height: 1; }
        .langkah-icon { width: 56px; height: 56px; background: rgba(255,255,255,0.15); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin: 0 auto 1rem; }
        .langkah-card h3 { font-size: 1rem; font-weight: 700; margin-bottom: .5rem; }
        .langkah-card p { font-size: .83rem; color: rgba(255,255,255,0.75); line-height: 1.6; }
        .langkah-num-badge { width: 28px; height: 28px; background: #3b3bdb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .75rem; font-weight: 700; color: #fff; margin: 1rem auto 0; }

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
        .p-card-body { padding: 1.2rem; }
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

        /* TESTIMONI */
        #testimoni { background: #eef0fb; }
        .testi-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 2rem; }
        .testi-card { background: #fff; border-radius: 16px; padding: 1.5rem; border: 1.5px solid #e8e8f0; transition: all .25s; }
        .testi-card:hover { box-shadow: 0 8px 28px rgba(26,26,110,0.08); border-color: #c7c7ff; }
        .testi-top { display: flex; align-items: center; gap: .8rem; margin-bottom: 1rem; }
        .testi-avatar { width: 44px; height: 44px; border-radius: 50%; flex-shrink: 0; background: linear-gradient(135deg, #1a1a6e, #3b3bdb); display: flex; align-items: center; justify-content: center; font-weight: 700; color: #fff; font-size: .9rem; }
        .testi-name { font-weight: 700; font-size: .9rem; color: #1a1a2e; }
        .testi-company { font-size: .75rem; color: #888; margin-top: .1rem; }
        .testi-stars { color: #f59e0b; font-size: .85rem; margin-bottom: .8rem; }
        .testi-text { font-size: .85rem; color: #555; line-height: 1.65; font-style: italic; }

        /* FOOTER */
        footer { background: #1a1a6e; color: rgba(255,255,255,0.6); padding: 2rem 5%; text-align: center; font-size: .85rem; }
        footer a { color: #7eb8ff; text-decoration: none; }

        @media(max-width: 900px) {
            .hero-right { display: none; }
            .langkah-grid, .perusahaan-grid, .testi-grid { grid-template-columns: 1fr 1fr; }
        }
        @media(max-width: 600px) {
            .langkah-grid, .perusahaan-grid, .testi-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a href="/" class="navbar-brand">
        <div class="brand-logo">RI</div>
        <span class="brand-name">RekomIntern</span>
    </a>
    <ul class="nav-links">
        <li><a href="/" class="active">Home</a></li>
        <li><a href="#perusahaan">Perusahaan</a></li>
        <li><a href="{{ route('rekomendasi') }}" class="nav-btn">Start Rekomendasi</a></li>
        <li><div class="nav-avatar"><i class="fas fa-user"></i></div></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-inner">
        <div class="hero-left">
            <h1>Welcome to<br><span>RekomIntern!</span></h1>
            <p>Masukkan skill kamu di RekomInternship untuk dapatkan rekomendasi magang yang tepat! Raih pengalaman berharga dan kembangkan karier bersama perusahaan impian. Mulai sekarang dan perluas jaringanmu!</p>
            <a href="{{ route('rekomendasi') }}" class="btn-hero">Start Rekomendasi</a>
        </div>
        <div class="hero-right">
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
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LANGKAH-LANGKAH -->
<section id="langkah">
    <h2 class="sec-title">Langkah – langkah</h2>
    <div class="langkah-grid">
        <div class="langkah-card">
            <div class="langkah-num">1</div>
            <div class="langkah-icon"><i class="fas fa-mouse-pointer"></i></div>
            <h3>Mulai Rekomendasi</h3>
            <p>Klik tombol mulai untuk memulai proses pencarian rekomendasi magang terbaik untukmu.</p>
            <div class="langkah-num-badge">1</div>
        </div>
        <div class="langkah-card">
            <div class="langkah-num">2</div>
            <div class="langkah-icon"><i class="fas fa-user-edit"></i></div>
            <h3>Isi Data Diri</h3>
            <p>Masukkan data diri kamu seperti IPK, skill, teknologi yang dikuasai, dan minat bidang industri yang diinginkan.</p>
            <div class="langkah-num-badge">2</div>
        </div>
        <div class="langkah-card">
            <div class="langkah-num">3</div>
            <div class="langkah-icon"><i class="fas fa-trophy"></i></div>
            <h3>Dapatkan Hasil</h3>
            <p>Lihat rekomendasi perusahaan magang yang paling cocok dengan profil kamu, lengkap dengan skor kesesuaian.</p>
            <div class="langkah-num-badge">3</div>
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
        <img src="{{ asset('img/perusahaan/PT Indoprima Gemilang.jpg') }}" alt="{{ $p->name }}">
    @elseif($loop->index == 1)
        <img src="{{ asset('img/perusahaan/link-apisindo.jpg') }}" alt="{{ $p->name }}">
    @elseif($loop->index == 2)
        <img src="{{ asset('img/perusahaan/arm.jpg') }}" alt="{{ $p->name }}">
    @elseif($loop->index == 3)
        <img src="{{ asset('img/perusahaan/sarastya.jpg') }}" alt="{{ $p->name }}">
    @elseif($loop->index == 4)
        <img src="{{ asset('img/perusahaan/timedoor.jpg') }}" alt="{{ $p->name }}">
    @elseif($loop->index == 5)
        <img src="{{ asset('img/perusahaan/foto6.jpg') }}" alt="{{ $p->name }}">
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

<!-- TESTIMONI -->
<section id="testimoni">
    <h2 class="sec-title">Review Mahasiswa</h2>
    <p class="sec-sub">Pengalaman mahasiswa yang sudah menggunakan RekomIntern.</p>
    <div class="testi-grid">
        <div class="testi-card">
            <div class="testi-top">
                <div class="testi-avatar">L</div>
                <div><div class="testi-name">Daffa</div><div class="testi-company">Magang di PT ARM Solusi</div></div>
            </div>
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"Saya merasa sangat terbantu dengan Platform RekomIntern. Platform ini membantu saya menemukan tempat magang yang sesuai dengan skill dan minat saya."</p>
        </div>
        <div class="testi-card">
            <div class="testi-top">
                <div class="testi-avatar">S</div>
                <div><div class="testi-name">Isna</div><div class="testi-company">Magang di PT Link Apisindo</div></div>
            </div>
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"Fitur rekomendasinya akurat banget! Tidak perlu bingung pilih tempat magang karena sistem langsung mencarikan yang paling cocok untuk saya."</p>
        </div>
        <div class="testi-card">
            <div class="testi-top">
                <div class="testi-avatar">R</div>
                <div><div class="testi-name">Zaki</div><div class="testi-company">Magang di Dinas Kominfo Jatim</div></div>
            </div>
            <div class="testi-stars">★★★★☆</div>
            <p class="testi-text">"Tampilan webnya bersih dan mudah digunakan. Informasi perusahaan lengkap, mulai dari posisi sampai info uang saku. Sangat recommended!"</p>
        </div>
    </div>
</section>

<footer>
    <p>&copy; {{ date('Y') }} RekomIntern — Platform Rekomendasi Magang Mahasiswa.</p>
    <p style="margin-top:.4rem"><a href="/">Home</a> · <a href="#perusahaan">Perusahaan</a> · <a href="{{ route('rekomendasi') }}">Start Rekomendasi</a></p>
</footer>

<script>
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