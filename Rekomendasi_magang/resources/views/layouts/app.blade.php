<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'InternPortal Admin')</title>

        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- FONT AWESOME -->
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>

            /* ================= GLOBAL ================= */
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
                font-family:'Inter', sans-serif;
            }

            body{
                background:#F5F7FB;
                color:#292929;
            }

            a{
                text-decoration:none;
            }

            .layout{
                display:flex;
                min-height:100vh;
            }

            /* ================= SIDEBAR ================= */
            .sidebar{
                width:260px;
                position:fixed;
                top:0;
                left:0;
                bottom:0;
                
                display:flex;
                flex-direction:column;
                justify-content:space-between;

                background:linear-gradient(
                    180deg,
                    #08084A 0%,
                    #10106B 100%
                );

                color:white;
                box-shadow:4px 0 20px rgba(0,0,0,0.08);
                z-index:1000;
            }

            .sidebar-top{
                padding:24px 0px;
            }

            .sidebar-top .logo {
                padding: 0 18px;
                margin-bottom: 20px; /* Jarak ke menu */
            }
            
            .logo{
                display:flex;
                align-items:center;
                gap:12px;
                margin-bottom:40px;
            }

            .logo-icon{
                width:42px;
                height:42px;

                display:flex;
                justify-content:center;
                align-items:center;

                border-radius:14px;
                background:white;

                color:#0606CD;
                font-weight:800;
            }

            .logo-text{
                font-size:22px;
                font-weight:800;
            }

            /* ================= MENU ================= */
            .menu{
                display:flex;
                flex-direction:column;
            }

            .menu-item{
                display:flex;
                align-items:center;
                gap:14px;

                padding:14px 16px;

                color:rgba(255,255,255,0.75);
                font-weight:500;

                transition:0.25s;
            }

            .menu-item:hover{
                background:rgba(255,255,255,0.08);
                color:white;
            }

            .menu-item.active{
                background:white;
                color:#0606CD;
                font-weight:700;
            }

            .menu-icon{
                width:18px;
                text-align:center;
            }

            /* ================= SIDEBAR BOTTOM LOGOUT ================= */
            .sidebar-bottom{
                padding:20px;
                border-top:1px solid rgba(255,255,255,0.1);
            }

            .logout-btn{
                display:flex;
                align-items:center;
                gap:12px;

                padding:12px 15px;
                border-radius:12px;

                color:#ff6b6b;
                font-weight:600;

                transition:0.25s;
            }

            .logout-btn:hover{
                background:rgba(255,255,255,0.08);
                color:white;
            }

            /* ================= MAIN ================= */

            .main{
                flex:1;
                margin-left:260px;
            }

            /* ================= TOPBAR ================= */

            .topbar{
                height:80px;
                background:white;
                display:flex;
                justify-content:space-between;
                align-items:center;
                padding:0 32px;
                border-bottom:1px solid #ECECEC;
            }

            .topbar-left{
                display:flex;
                flex-direction:column;
                gap:4px;
            }

            .topbar-title{
                font-size:22px;
                font-weight:700;
                color:#111827;
            }

            .topbar-right{
                display:flex;
                align-items:center;
            }

            .admin-top{
                display:flex;
                align-items:center;
                gap:12px;
            }

            .admin-name-top{
                font-size:16px;
                font-weight:500;
                color:#111827;
            }

            .admin-mini{
                width:38px;
                height:38px;
                border-radius:50%;

                background:linear-gradient(
                    135deg,
                    #A5B4FC,
                    #818CF8
                );
            }

            /* ================= CONTENT ================= */

            .content{
                padding:32px;
            }

            .page-header{
                display:flex;
                justify-content:space-between;
                align-items:center;

                margin-bottom:30px;
            }

            .page-title{
                font-size:32px;
                font-weight:700;
            }

            .page-subtitle{
                color:#767587;
                font-size:15px;
            }

            /* ================= BUTTON ================= */
            .btn-primary-custom{
                display:inline-flex;
                align-items:center;
                gap:10px;

                padding:14px 22px;
                border:none;
                border-radius:14px;

                background:linear-gradient(
                    135deg,
                    #0606CD,
                    #4338CA
                );

                color:white;
                font-size:14px;
                font-weight:600;

                cursor:pointer;
                transition:0.25s;

                box-shadow:0 8px 20px rgba(67,56,202,0.22);
            }

            .btn-primary-custom:hover{
                transform:translateY(-2px);
                color:white;
            }

            .btn-outline-custom{
                padding:12px 18px;

                border:1px solid #D1D5DB;
                border-radius:12px;

                background:white;

                color:#292929;
                font-weight:600;

                transition:0.2s;
            }

            .btn-outline-custom:hover{
                background:#F4F4F5;
            }

            /* ================= CARD ================= */

            .card{
                padding:24px;
                margin-bottom:24px;

                background:white;
                border-radius:12px;

                box-shadow:0 6px 20px rgba(0,0,0,0.04);
                transition:0.3s;
            }

            .card:hover{
                transform:translateY(-4px);
                box-shadow:0 12px 28px rgba(0,0,0,0.08);
            }

            .card-title{
                display:flex;
                align-items:center;
                gap:12px;

                padding-bottom:18px;
                margin-bottom:24px;

                font-size:18px;
                font-weight:800;

                border-bottom:1px solid #ECECEC;
            }

        /* ================= STATS ================= */
            .stats{
                display:grid;
                grid-template-columns:repeat(3,1fr);
                gap:22px;

                margin-bottom:18px;
            }

            .stat-card{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                
                padding: 16px;
                gap: 5px;
            }

            .stat-header{
                display:flex;
                align-items:center;
                gap:14px;
            }

            .stat-icon{
                width:54px;
                height:54px;
                border-radius:18px;
                display:flex;
                justify-content:center;
                align-items:center;
                font-size:20px;
            }

            .blue{
                background:#EEF2FF;
                color:#4338CA;
            }

            .green{
                background:#DCFCE7;
                color:#16A34A;
            }

            .red{
                background:#FEE2E2;
                color:#DC2626;
            }

            .stat-label{
                font-size:14px;
                font-weight:700;
                color:#767587;
                letter-spacing:1px;
            }

            .stat-number{
                font-size:42px;
                font-weight:800;
            }

            .stat-footer{
                display:flex;
                justify-content:space-between;
                align-items:center;
            }

            .success{
                color:#16A34A;
                font-weight:600;
                font-size:14px;
            }

            .warning {
                color: #f39c12; /* Warna orange/kuning gelap */
                font-weight: 600;
                font-size:14px;
            }
            
            /* ================= FORM ================= */
            .form-row{
                display:grid;
                grid-template-columns:1fr 1fr;
                gap:20px;
            }  

            .form-group{
                margin-bottom:20px;
            }

            .form-label{
                display:block;
                margin-bottom:10px;
                font-size:14px;
                font-weight:700;
                color:#333;
            }

            .form-input,
            .form-select,
            .form-textarea{
                width:100%;
                border:1px solid #E5E7EB;
                border-radius:14px;
                padding:14px 16px;
                font-size:14px;
                outline:none;
                transition:0.2s;
            }

            .form-input:focus,
            .form-select:focus,
            .form-textarea:focus{
                border-color:#0606CD;
                box-shadow:0 0 0 4px rgba(6,6,205,0.08);
            }

            .form-textarea{
                min-height:150px;
                resize:none;
            }
            
            /* ================= TABLE ================= */
            .table-card{
                overflow:hidden;
            }

            .table-header{
                display:flex;
                justify-content:space-between;
                align-items:center;

                padding:18px;
                border-bottom:1px solid #ECECEC;
            }

            .table-title{
                font-size:22px;
                font-weight:800;
            }

            .search-box{
                width:350px;
                padding:14px;

                background:#F4F6FB;
                border:none;
                border-radius:14px;

                font-size:14px;
                outline:none;
            }

            table{
                width:100%;
                border-collapse:collapse;
            }

            thead{
                background:#F4F6FB;
            }

            th{
                padding:18px 24px;
                text-align:left;
                font-size:12px;
                font-weight:700;
                letter-spacing:1px;
                color:#6B7280;
            }

            td{
                padding:22px 24px;
                font-size:14px;
                border-top:1px solid #F1F1F1;
            }

            tbody tr:hover{
                background:#FAFBFF;
            }

            td .tag-more {
                display: inline-flex;
                align-items: center;
                
                padding: 6px 12px;
                border-radius: 999px;
                border: 1px dashed #A5B4FC; /* Memberikan border putus-putus halus */
                
                background-color: #F0F2FF;  /* Background sedikit lebih terang */
                color: #4338CA;             /* Warna teks ungu/biru utama */
                
                font-size: 12px;
                font-weight: 400;
                cursor: help;               /* Mengubah cursor menjadi tanda tanya saat di-hover */
                white-space: nowrap;
            }

            td .tag-more:hover {
                background-color: #E0E4FF;
            }            
            
            /* ================= COMPANY ================= */
            .company{
                display:flex;
                align-items:center;
                gap:14px;
            }

            .company-logo{
                width:48px;
                height:48px;

                display:flex;
                justify-content:center;
                align-items:center;

                border-radius:14px;
                background:#EEF2FF;

                overflow:hidden;
                flex-shrink:0;

                color:#4338CA;
                font-weight:700;
            }

            .company-logo img{
                width:100%;
                height:100%;
                object-fit:cover;
            }

            /* ================= POSITION TAGS ================= */
            .position-group {
                padding: 20px;
            }

            /* Wadah untuk menampung semua tags agar otomatis turun ke bawah jika penuh */
            .tags-container {
                display: flex;
                flex-wrap: wrap; /* Membuat tag otomatis bungkus ke baris baru */
                gap: 10px;       /* Jarak antar tag */
            }

            /* Styling untuk masing-masing item tag */
            .tag-item {
                display: inline-flex;
                align-items: center;
                
                padding: 10px 20px;
                border-radius: 999px; /* Membuat bentuk kapsul/lonjong sempurna */
                
                background-color: #DDE5FF; /* Warna background biru muda sesuai gambar */
                color: #08084A;            /* Warna teks biru gelap */
                
                font-size: 12px;
                font-weight: 600;
                cursor: default;
                transition: 0.2s;
            }

            .tag-item:hover {
                background-color: #C7D2FE; /* Efek sedikit lebih gelap saat di-hover */
            }            

            /* ================= BADGE ================= */
            .badge-custom{
                display:inline-block;

                padding:7px 14px;
                border-radius:999px;

                font-size:11px;
                font-weight:700;
            }

            .badge-blue{
                background:#DBEAFE;
                color:#1D4ED8;
            }

            .badge-green{
                background:#DCFCE7;
                color:#166534;
            }

            /* ================= TOGGLE SWITCH ================= */

            .switch-toggle{
                position:relative;
                display:inline-block;
                width:52px;
                height:28px;
            }

            .switch-toggle input{
                opacity:0;
                width:0;
                height:0;
            }

            .switch-slider{
                position:absolute;
                top:0;
                left:0;
                right:0;
                bottom:0;

                cursor:pointer;
                background:#D1D5DB;
                border-radius:999px;

                transition:0.3s;
            }

            .switch-slider::before{
                content:'';

                position:absolute;
                width:22px;
                height:22px;

                left:3px;
                top:3px;

                background:white;
                border-radius:50%;

                transition:0.3s;
                box-shadow:0 2px 6px rgba(0,0,0,0.15);
            }

            .switch-toggle input:checked + .switch-slider{
                background:#22C55E;
            }

            .switch-toggle input:checked + .switch-slider::before{
                transform:translateX(24px);
            }           
            /* ================= ACTION BUTTON ================= */
            .action-buttons{
                display:flex;
                justify-content:center;
                gap:10px;
            }

            .action-buttons form{
                margin:0;
            }

            .action-btn{
                width:38px;
                height:38px;

                display:flex;
                justify-content:center;
                align-items:center;

                border:none;
                border-radius:12px;

                font-size:15px;
                cursor:pointer;

                transition:0.25s;
            }

            .action-btn.edit{
                background:#EEF2FF;
                color:#4338CA;
            }

            .action-btn.edit:hover{
                background:#4338CA;
                color:white;
            }

            .action-btn.delete{
                background:#FEF2F2;
                color:#DC2626;
            }

            .action-btn.delete:hover{
                background:#DC2626;
                color:white;
            }

            /* ================= EDITOR ================= */
            .editor-toolbar{
                display:flex;
                gap:18px;

                padding:14px 16px;

                border:1px solid #E5E7EB;
                border-bottom:none;
                border-radius:14px 14px 0 0;
            }

            .editor-area{
                min-height:160px;
                padding:18px;

                border:1px solid #E5E7EB;
                border-radius:0 0 14px 14px;

                color:#9CA3AF;
            }

            /* ================= UPLOAD ================= */
            .upload-box{
                padding:40px 20px;

                border:2px dashed #D1D5DB;
                border-radius:18px;

                text-align:center;
            }

            .upload-icon{
                width:56px;
                height:56px;

                display:flex;
                justify-content:center;
                align-items:center;

                margin:auto auto 14px;

                border-radius:50%;
                background:#EEF2FF;

                color:#1212ff;
                font-size:20px;
            }

            .upload-title{
                margin-bottom:4px;

                color:#1212ff;
                font-weight:700;
            }

            .upload-sub{
                font-size:12px;
                color:#8B8B8B;
            }

            /* ================= RANGE ================= */
            .range-header{
                display:flex;
                justify-content:space-between;
                align-items:center;

                margin-bottom:10px;
            }

            .range-value{
                color:#1212ff;
                font-weight:700;
            }

            .range-input{
                width:100%;
            }

            /* ================= SWITCH WRAPPER ================= */
            .switch-wrapper{
                display:flex;
                justify-content:space-between;
                align-items:center;

                padding:22px;

                border:1px solid #ECECEC;
                border-radius:18px;
            }

            .switch-text h4{
                margin-bottom:6px;
            }

            .switch-text p{
                color:#777;
                font-size:14px;
            }

            /* ================= BOTTOM ACTION ================= */
            .bottom-actions{
                display:flex;
                justify-content:space-between;
                align-items:center;

                margin-top:20px;
            }

            /* ================= BUTTON GENERAL ================= */
            .btn{
                padding:14px 26px;

                border:none;
                border-radius:14px;

                font-size:14px;
                font-weight:700;

                cursor:pointer;
                transition:0.2s;
            }

            .btn:hover{
                transform:translateY(-2px);
            }

            .btn-outline{
                background:white;
                border:1px solid #D1D5DB;
            }

            .btn-secondary{
                background:#DDE5FF;
                color:#1212ff;
            }

            .btn-primary{
                background:#1212ff;
                color:white;
            }

            /* ================= PAGINATION ================= */
            .pagination-wrapper{
                display:flex;
                justify-content:space-between;
                align-items:center;

                padding:22px 24px;

                background:#FAFAFA;
                border-top:1px solid #ECECEC;
            }

            .pagination-wrapper .pagination{
                justify-content:flex-end;
            }

            .pagination-buttons{
                display:flex;
                align-items:center;
                gap:10px;
            }

            .page-btn{
                min-width:38px;
                height:38px;

                display:flex;
                justify-content:center;
                align-items:center;

                padding:0 14px;

                border:1px solid #E5E7EB;
                border-radius:10px;

                background:white;

                color:#292929;
                font-size:14px;
                font-weight:600;

                transition:0.2s;
            }

            .page-btn:hover{
                background:#F4F4F5;
                color:#0606CD;
            }

            .page-btn.active{
                background:#0606CD;
                border-color:#0606CD;
                color:white;
            }

            .page-btn.disabled{
                opacity:0.5;
                cursor:not-allowed;
                pointer-events:none;
            }

            /* ================= TAMBAH PERUSAHAAN ================= */
            /* ================= CONTENT GRID ================= */
            .content-grid{
                display:grid;
                grid-template-columns:2fr 1fr;
                gap:24px;
            }

            /* ================= RESPONSIVE ================= */

            @media(max-width:992px){

                .sidebar{
                    display:none;
                }

                .main{
                    margin-left:0;
                }

                .content-grid,
                .form-row{
                    grid-template-columns:1fr;
                }

                .page-header{
                    flex-direction:column;
                    align-items:flex-start;
                    gap:18px;
                }

                .table-card{
                    overflow-x:auto;
                }

                table{
                    min-width:950px;
                }

                .search-box{
                    width:100%;
                }
            }

            /* ================= TYPE BUTTON ================= */
            .type-group{
                display:flex;
                gap:12px;
            }

            .type-btn{
                flex:1;
                padding:16px;

                border:1px solid #E5E7EB;
                border-radius:14px;

                background:white;

                font-weight:700;
                cursor:pointer;

                transition:0.2s;
            }

            .type-btn.active{
                background:#1212ff;
                border-color:#1212ff;
                color:white;
            }
        </style>
        
        @stack('styles')

    </head>

    <body>
        <div class="layout">
            <!-- SIDEBAR -->
            <aside class="sidebar">
                <div class="sidebar-top">
                    <div class="logo">
                        <div class="logo-icon">
                            IP
                        </div>
                        <div class="logo-text">
                            InternPortal
                        </div>
                    </div>

                    <div class="menu">
                        <a href="{{ route('dashboard.index') }}"
                        class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                            <div class="menu-icon">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            Dashboard
                        </a>

                        <a href="{{ route('dashboard.create') }}"
                        class="menu-item {{ request()->routeIs('dashboard.create') ? 'active' : '' }}">
                            <div class="menu-icon">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            Tambah Perusahaan
                        </a>
                    </div>
                </div>

                <div class="sidebar-bottom">
                    <a href="#" class="logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                </div>

            </aside>

            <!-- MAIN -->
            <main class="main">

                <!-- TOPBAR -->
                <div class="topbar">
                    <div class="topbar-left">
                        <div>
                            <div class="topbar-title">
                                @yield('topbar_title')
                            </div>
                        </div>
                    </div>

                    <div class="topbar-right">
                        <div class="admin-top">
                            <span class="admin-name-top">
                                Admin
                            </span>
                            <div class="admin-mini"></div>
                        </div>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="content">
                    @yield('content')
                </div>
            </main>

        </div>

        <!-- SWEETALERT -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>

        // ================= DELETE =================

        document.querySelectorAll('.form-delete').forEach(form => {

            form.addEventListener('submit', function (e) {

                e.preventDefault();

                Swal.fire({
                    title: 'Hapus Data?',
                    text: 'Data yang dihapus tidak bisa dikembalikan',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DC2626',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal',
                    borderRadius: '20px'
                })

                .then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });

        </script>
    </body>
</html>