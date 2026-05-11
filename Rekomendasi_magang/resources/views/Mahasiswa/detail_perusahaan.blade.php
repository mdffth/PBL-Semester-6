<!-- resources/views/admin/detail_perusahaan.blade.php -->

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
        .navbar{
            width: 100%;
            background: #FFFFFF;
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px dashed #0242C4;
        }

        .logo{
            font-size: 24px;
            font-weight: bold;
            color: #0242C4;
        }

        .nav-menu{
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-menu a{
            text-decoration: none;
            color: #7C8299;
            font-size: 14px;
        }

        .btn-login{
            padding: 8px 20px;
            border: 1px solid #0242C4;
            border-radius: 8px;
            color: #0242C4 !important;
            font-weight: 600;
        }

        .btn-primary{
            background: #0242C4;
            color: white !important;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
        }

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
            gap: 15px;
            color: #7C8299;
            font-size: 14px;
        }

        .section-title{
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            border-left: 5px solid #0242C4;
            padding-left: 12px;
        }

        .description{
            color: #555;
            line-height: 1.8;
            font-size: 16px;
        }

        .responsibility-list{
            margin-top: 20px;
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
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .info-group{
            margin-bottom: 25px;
        }

        .info-label{
            font-size: 12px;
            color: #7C8299;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .info-value{
            font-size: 15px;
            color: #333;
            font-weight: 500;
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

        footer{
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
        }

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
    <div class="navbar">
        <div class="logo">InternPath</div>

        <div class="nav-menu">
            <a href="#">Beranda</a>
            <a href="#">Perusahaan</a>
            <a href="#" class="btn-login">Login</a>
            <a href="#" class="btn-primary">Mulai Rekomendasi</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">

        <!-- LEFT -->
        <div>

            <!-- IMAGE -->
            <div class="card">
                <img src="{{ asset('images/reka.png') }}" class="company-image">

                <div class="company-header">
                    <div class="company-title">
                        PT. Rekaindo Global Jasa
                    </div>

                    <div class="company-badge">
                        <span>🏢 TechNova Solutions</span>
                        <span>✔ Verified Employer</span>
                    </div>
                </div>
            </div>

            <!-- PROFILE -->
            <div class="card">
                <div class="section-title">
                    Profil Perusahaan
                </div>

                <div class="description">
                    PT Rekaindo Global Jasa (REKA) berdiri 1998 di Madiun,
                    merupakan perusahaan konsultan engineering dan support
                    komponen kereta api. Dimiliki bersama PT INKA, Nippon
                    Sharyo Ltd, Sumitomo Corporation, dan KOPINKA.
                    Bergerak di bidang desain 3D, panel kontrol elektrik,
                    dan komponen perkeretaapian.
                </div>
            </div>

            <!-- JOB DESCRIPTION -->
            <div class="card">
                <div class="section-title">
                    Detailed Job Description
                </div>

                <div class="description">
                    Kami membuka kesempatan magang bagi mahasiswa yang memiliki
                    minat dalam pengembangan sistem digital untuk mendukung
                    proses digitalisasi di perusahaan.
                    <br><br>
                    Pada posisi ini, Anda akan terlibat langsung dalam proses
                    pengembangan sistem, mulai dari perancangan, implementasi,
                    hingga dokumentasi.
                </div>

                <div class="section-title"
                     style="margin-top:35px; font-size:24px;">
                    Key Responsibilities
                </div>

                <ul class="responsibility-list">
                    <li>Berkolaborasi dalam pengembangan sistem dan aplikasi digital.</li>
                    <li>Mengimplementasikan front-end dan UI/UX.</li>
                    <li>Mendukung perancangan serta pengelolaan database.</li>
                    <li>Membantu dokumentasi dan maintenance sistem.</li>
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
                    <div class="info-label">Location</div>
                    <div class="info-value">Madiun, Indonesia</div>
                </div>

                <div class="info-group">
                    <div class="info-label">Internship Type</div>
                    <div class="info-value">On Site</div>
                </div>

                <div class="info-group">
                    <div class="info-label">Benefits</div>

                    <div class="tag-container">
                        <div class="tag">Certificate</div>
                        <div class="tag">Paid Salary</div>
                        <div class="tag">Work Experience</div>
                    </div>
                </div>

                <div class="info-group">
                    <div class="info-label">Required Skills</div>

                    <div class="tag-container">
                        <div class="tag">Figma</div>
                        <div class="tag">UX Research</div>
                        <div class="tag">UI Design</div>
                        <div class="tag">Teamwork</div>
                    </div>
                </div>

                <button class="apply-btn">
                    Daftar / Apply →
                </button>

            </div>

            <div class="sidebar-card help-box">
                <h3>Need Help?</h3>

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
    <footer>

        <div>
            <h3>InternPath</h3>
            <p>© 2024 InternPath. Bridging academic life and professional careers.</p>
        </div>

        <div class="footer-links">
            <a href="#">About Us</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Help Center</a>
            <a href="#">Contact</a>
        </div>

    </footer>

</body>
</html>