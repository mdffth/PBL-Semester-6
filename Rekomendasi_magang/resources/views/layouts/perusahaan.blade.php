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
                display:60px;
                min-height:100vh;
            }

            /* ================= SIDEBAR (KIRI) ================= */
            .sidebar {
                width: 260px;
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                background: #1a1a6e;
                color: white;
                box-shadow: 4px 0 20px rgba(0,0,0,0.05);
                z-index: 900;
            }

            .sidebar-top {
                padding-top: 15px; /* Menghapus padding putih besar yang merusak layout */
            }

            /* ================= 4. MENU SIDEBAR ================= */
            .menu {
                display: flex;
                flex-direction: column;
            }

            .menu-item {
                display: flex;
                align-items: center;
                gap: 14px;
                padding: 14px 20px;
                color: rgba(255,255,255,0.7);
                text-decoration: none;
                font-weight: 500;
                font-size: 0.95rem;
                transition: 0.2s;
            }

            .menu-item:hover {
                background: rgba(255,255,255,0.05);
                color: white;
            }

            .menu-item.active {
                background: #fff;
                color: #1a1a6e;
                font-weight: 700;
            }

            .menu-icon {
                width: 20px;
                text-align: center;
                font-size: 1.1rem;
            }

            /* ================= TAMBAHAN CSS UNTUK TOGGLE SIDEBAR ================= */

            /* Kontainer Logo & Tombol di Sidebar */
            .sidebar-brand-box {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 10px 20px 20px 20px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                margin-bottom: 15px;
            }

            .sidebar-logo-title {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .logo-icon-sm {
                width: 30px;
                height: 30px;
                background: #fff;
                border-radius: 6px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 800;
                color: #1a1a6e;
                font-size: 1rem;
            }

            .logo-text-sm {
                color: #fff;
                font-weight: 700;
                font-size: 1.20rem;
            }

            /* Desain Tombol Toggle */
            .toggle-sidebar-btn {
                background: none;
                border: none;
                color: rgba(255, 255, 255, 0.7);
                font-size: 1.1rem;
                cursor: pointer;
                padding: 5px;
                border-radius: 6px;
                transition: 0.2s;
            }

            .toggle-sidebar-btn:hover {
                color: #fff;
                background: rgba(255, 255, 255, 0.1);
            }

            /* Efek Animasi Geser */
            .sidebar {
                transition: transform 0.3s ease, width 0.3s ease;
            }

            .main {
                transition: margin-left 0.3s ease;
            }

            /* Kelas Trigger saat Sidebar disembunyikan (diaktifkan via JS) */
            .sidebar.collapsed {
                transform: translateX(-260px); /* Menggeser sidebar keluar ke arah kiri */
            }

            .main.expanded {
                margin-left: 0; /* Area konten mengambil alih sisa ruang penuh */
            }

            /* ================= 5. UTAMA / KONTEN (KANAN) ================= */
            .main {
                flex-grow: 1;
                margin-left: 260px; /* Memberi jarak selebar sidebar agar tidak bertabrakan */
                background: #f8fafc;
                min-width: 0; /* KUNCI: Mencegah tabel merusak/melebarkan layout flex */
            }

            .main-container {
                padding: 23px 40px 40px;
                width: 100%;
                box-sizing: border-box;
            }

            /* ================= SIDEBAR BOTTOM LOGOUT ================= */
            .sidebar-bottom {
                padding: 20px;
                border-top: 1px solid rgba(255,255,255,0.1);
            }

            .logout-btn {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 15px;
                border-radius: 12px;
                color: #ff6b6b;
                text-decoration: none;
                font-weight: 600;
                transition: 0.25s;
            }

            .logout-btn:hover {
                background: rgba(255,255,255,0.08);
                color: white;
            }

            /* ================= MAIN ================= */

            .main{
                flex:1;
                margin-left:260px;
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
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 22px;
                /* margin-bottom: 18px; */
            }

            .stat-link{
                text-decoration: none;
                color: inherit;
                display: block;
            }

            .stat-card{
                padding: 21px !important;

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;

                gap: 5px;
                cursor: pointer;
            }

            .stat-header{
                display: flex;
                align-items: center;
                gap: 14px;
            }

            .stat-icon{
                width: 54px;
                height: 54px;
                border-radius: 18px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 20px;
            }

            .blue{
                background: #EEF2FF;
                color: #4338CA;
            }

            .green{
                background: #DCFCE7;
                color: #16A34A;
            }

            .red{
                background: #FEE2E2;
                color: #DC2626;
            }

            .stat-label{
                font-size: 14px;
                font-weight: 700;
                color: #767587;
                letter-spacing: 1px;
            }

            .stat-number{
                font-size: 42px;
                font-weight: 800;
            }

            .stat-footer{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            /* hover stat */

            .stat-card:hover{
                transform: translateY(-4px);
                box-shadow: 0 10px 20px rgba(30, 58, 138, 0.12);
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
                font-size: 18px;
                font-weight:600;
                color: #7b7b89;
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
            .posisi-wrapper{
                display:flex;
                flex-wrap:wrap;
                gap:8px;
                max-width:280px;
            }

            .badge-posisi{
                padding:6px 12px;

                background:#EEF2FF;
                color:#4338CA;

                border-radius:20px;

                font-size:12px;
                font-weight:600;

                white-space:nowrap;
            }

            .badge-more{
                padding:6px 12px;

                background:#F3F4F6;
                color:#6B7280;

                border-radius:20px;

                font-size:12px;
                font-weight:600;
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

        /* ================= Tambah Perusahaan ================= */

        .page-header{
            display:flex;
            align-items:center;
            gap:16px;

            margin-bottom:26px;
        }

        .page-title{
            font-size:22px;
            font-weight:800;
        }

        .content-grid{
            display:grid;
            grid-template-columns:2fr 1fr;
            gap:24px;
        }

        .card{
            background:white;
            border-radius:24px;
            padding:28px;

            box-shadow:0 6px 18px rgba(0,0,0,0.04);
            margin-bottom:24px;
        }

        .card-title{
            font-size:18px;
            font-weight:800;

            margin-bottom:24px;
            padding-bottom:18px;

            border-bottom:1px solid #ECECEC;

            display:flex;
            align-items:center;
            gap:12px;
        }

        .form-row{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;

            margin-bottom:20px;
        }

        .form-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:10px;

            font-size:14px;
            font-weight:700;

            color:#333;
        }

        .input,
        .select,
        .textarea{
            width:100%;

            border:1px solid #E5E7EB;
            border-radius:14px;

            padding:14px 16px;

            font-size:14px;
            outline:none;

            transition:0.2s;
        }

        .input:focus,
        .select:focus,
        .textarea:focus{
            border-color:#1212ff;
            box-shadow:0 0 0 4px rgba(18,18,255,0.08);
        }

        .textarea{
            min-height:180px;
            resize:none;
        }

        .editor-toolbar{
            border:1px solid #E5E7EB;
            border-bottom:none;

            padding:14px 16px;

            border-radius:14px 14px 0 0;

            display:flex;
            gap:18px;
        }

        .editor-area{
            border:1px solid #E5E7EB;
            border-radius:0 0 14px 14px;

            min-height:160px;

            padding:18px;

            color:#9CA3AF;
        }

        .upload-box{
            border:2px dashed #D1D5DB;
            border-radius:18px;

            padding:40px 20px;

            text-align:center;
        }

        .upload-icon{
            width:56px;
            height:56px;

            border-radius:50%;
            background:#EEF2FF;

            display:flex;
            justify-content:center;
            align-items:center;

            margin:auto;
            margin-bottom:14px;

            color:#1212ff;
            font-size:20px;
        }

        .upload-title{
            color:#1212ff;
            font-weight:700;
            margin-bottom:4px;
        }

        .upload-sub{
            font-size:12px;
            color:#8B8B8B;
        }

        .type-group{
            display:flex;
            gap:12px;
        }

        .type-btn{
            flex:1;

            border:1px solid #E5E7EB;
            background:white;

            border-radius:14px;

            padding:16px;

            font-weight:700;

            cursor:pointer;

            transition:0.2s;
        }

        .type-btn.active{
            background:#1212ff;
            color:white;
            border-color:#1212ff;
        }

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

        .switch{
            width:56px;
            height:30px;

            border-radius:999px;
            background:#1212ff;

            position:relative;
        }

        .switch::after{
            content:'';

            width:24px;
            height:24px;

            border-radius:50%;
            background:white;

            position:absolute;
            right:3px;
            top:3px;
        }

        .bottom-actions{
            display:flex;
            justify-content:space-between;
            align-items:center;

            margin-top:20px;
        }

        .btn{
            border:none;
            border-radius:14px;

            padding:14px 26px;

            font-size:14px;
            font-weight:700;

            cursor:pointer;

            transition:0.2s;
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

        .btn:hover{
            transform:translateY(-2px);
        }

        @media(max-width:992px){

            .content-grid{
                grid-template-columns:1fr;
            }

            .form-row{
                grid-template-columns:1fr;
            }

            .sidebar{
                display:none;
            }
        }

        /* =========================
        CHART GRID
        ========================= */

        .chart-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:20px;
        }

        /* =========================
        CARD CHART
        ========================= */

        .dashboard-chart-header{
            padding:4px 0px;
            border-bottom:1px solid #e5e7eb;
        }

        .dashboard-chart-header h3{
            margin:0;
            font-size:26px;
            font-weight:800;
            color:#111827;
        }

        .dashboard-chart-body{
            padding:20px;
            height:350px;
        }

        /* =========================
        BAR CHART
        ========================= */

        .dashboard-chart-container{
            width:100%;
            height:100%;
            position:relative;
        }

        /* =========================
        DOUGHNUT CHART
        ========================= */

        .industry-wrapper{
            width:100%;
            height:100%;
        }

        .industry-chart{
            width:100%;
            height:100%;
            position:relative;
        }
        </style>
        
        @stack('styles')

    </head>

    <body>
        <div class="layout">
            <aside class="sidebar" id="sidebar">
                <div class="sidebar-top">
                    <div class="sidebar-brand-box">
                        <div class="sidebar-logo-title">
                            <div class="logo-icon-sm">IP</div>
                            <span class="logo-text-sm">InternPortal</span>
                        </div>
                        <button type="button" class="toggle-sidebar-btn" id="toggleSidebar">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>

                    <div class="menu">
                        <a href="{{ route('dashboard.index') }}"
                        class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                            <div class="menu-icon">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="menu-text">Dashboard</span>
                        </a>

                        <a href="{{ route('perusahaan.index') }}"
                        class="menu-item {{ request()->routeIs('perusahaan.index') ? 'active' : '' }}">
                            <div class="menu-icon">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <span class="menu-text">Daftar Perusahaan</span>
                        </a>

                        <a href="{{ route('perusahaan.create') }}"
                        class="menu-item {{ request()->routeIs('perusahaan.create') ? 'active' : '' }}">
                            <div class="menu-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <span class="menu-text">Tambah Perusahaan</span>
                        </a>
                    </div>
                </div>

                <div class="sidebar-bottom">
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="menu-icon">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </div>
                        <span class="menu-text">Logout</span>
                    </a>
                </div>
            </aside>

            <main class="main">
                <div class="main-container">
                    @yield('content')
                </div>              
            </main>

        </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                
                // --- LOGIC 1: TOGGLE SIDEBAR (BUKA / TUTUP) ---
                const toggleBtn = document.getElementById('toggleSidebar');
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.querySelector('.main');

                // Kita beri validasi if agar tidak error jika tombol tidak sengaja terhapus
                if (toggleBtn && sidebar && mainContent) {
                    toggleBtn.addEventListener('click', function() {
                        sidebar.classList.toggle('collapsed');
                        mainContent.classList.toggle('expanded');
                    });
                }

                // --- LOGIC 2: SWEETALERT UNTUK TOMBOL HAPUS ---
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
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });

            });
        </script>
</body>
</html>