<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'InternPortal Admin')</title>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>

            /* ================= GLOBAL ================= */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Inter', sans-serif;
            }

            body {
                background: #F5F7FB;
                color: #292929;
            }

            a { text-decoration: none; }

            .layout {
                display: flex;
                min-height: 100vh;
            }

            /* ================= SIDEBAR ================= */
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
                box-shadow: 4px 0 20px rgba(0,0,0,0.08);
                z-index: 900;
                overflow: hidden;                  /* Sembunyikan teks yang meluber saat mengecil */
                transition: width 0.3s ease;       /* Animasi lebar, bukan geser */
            }

            /* Saat collapsed: sidebar menyusut jadi 68px (cukup untuk icon) */
            .sidebar.collapsed {
                width: 68px;
            }

            .sidebar-top {
                padding-top: 15px;
            }

            /* ================= BRAND BOX ================= */
            .sidebar-brand-box {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 10px 19px 20px 19px;
                border-bottom: 1px solid rgba(255,255,255,0.08);
                margin-bottom: 15px;
                white-space: nowrap;               /* Cegah teks wrap saat menyempit */
            }

            .sidebar-logo-title {
                display: flex;
                align-items: center;
                gap: 10px;
                overflow: hidden;
            }

            .logo-icon-sm {
                width: 30px;
                height: 30px;
                min-width: 30px;                   /* Jangan ikut mengecil */
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
                transition: opacity 0.2s ease;
                white-space: nowrap;
            }

            /* Saat collapsed: sembunyikan teks logo */
            .sidebar.collapsed .logo-text-sm {
                opacity: 0;
                width: 0;
                overflow: hidden;
            }

            /* ================= TOMBOL TOGGLE (di dalam sidebar) ================= */
            .toggle-sidebar-btn {
                background: none;
                border: none;
                color: rgba(255,255,255,0.7);
                font-size: 1.1rem;
                cursor: pointer;
                padding: 5px 6px;
                border-radius: 6px;
                transition: 0.2s;
                min-width: 30px;
                flex-shrink: 0;
            }

            .toggle-sidebar-btn:hover {
                color: #fff;
                background: rgba(255,255,255,0.1);
            }

            /* ================= MENU ================= */
            .menu {
                display: flex;
                flex-direction: column;
            }

            .menu-item {
                display: flex;
                align-items: center;
                gap: 14px;
                padding: 14px 24px;
                color: rgba(255,255,255,0.7);
                text-decoration: none;
                font-weight: 500;
                font-size: 0.95rem;
                transition: background 0.2s, color 0.2s;
                white-space: nowrap;
                overflow: hidden;
                position: relative;
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
                min-width: 20px;                   /* Icon tidak ikut mengecil */
                text-align: center;
                font-size: 1.1rem;
            }

            /* Saat collapsed: sembunyikan teks menu */
            .menu-text {
                transition: opacity 0.2s ease;
                white-space: nowrap;
            }

            .sidebar.collapsed .menu-text {
                opacity: 0;
                width: 0;
                overflow: hidden;
            }

            /* Tooltip saat collapsed (hover pada menu item) */
            .sidebar.collapsed .menu-item {
                padding: 14px 0;
                justify-content: center;
            }

            .sidebar.collapsed .menu-item::after {
                content: attr(data-tooltip);
                position: absolute;
                left: 76px;
                top: 50%;
                transform: translateY(-50%);
                background: #1a1a6e;
                color: white;
                padding: 6px 12px;
                border-radius: 8px;
                font-size: 0.85rem;
                font-weight: 600;
                white-space: nowrap;
                opacity: 0;
                pointer-events: none;
                box-shadow: 2px 4px 12px rgba(0,0,0,0.2);
                transition: opacity 0.2s ease;
                z-index: 999;
            }

            .sidebar.collapsed .menu-item:hover::after {
                opacity: 1;
            }

            /* ================= SIDEBAR BOTTOM ================= */
            .sidebar-bottom {
                padding: 20px;
                border-top: 1px solid rgba(255,255,255,0.1);
            }

            .sidebar.collapsed .sidebar-bottom {
                padding: 20px 0;
                display: flex;
                justify-content: center;
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
                white-space: nowrap;
                overflow: hidden;
            }

            .logout-btn:hover {
                background: rgba(255,255,255,0.08);
                color: white;
            }

            .sidebar.collapsed .logout-btn {
                padding: 12px;
                gap: 0;
                justify-content: center;
            }

            .sidebar.collapsed .logout-btn .menu-text {
                display: none;
            }

            /* ================= MAIN CONTENT ================= */
            .main {
                flex-grow: 1;
                margin-left: 260px;
                background: #f8fafc;
                min-width: 0;
                transition: margin-left 0.3s ease;
            }

            /* Saat sidebar mengecil ke 68px, main ikut menyesuaikan */
            .main.collapsed-mode {
                margin-left: 68px;
            }

            .main-container {
                padding: 23px 40px 40px;
                width: 100%;
                box-sizing: border-box;
            }

            .main.collapsed-mode .main-container {
                padding: 23px 20px 40px;
            }  
            
            /* ================= TOP NAVBART ================= */
            .top-navbar{
                height: 82px;
                background: #ffffff;

                display: flex;
                justify-content: space-between;
                align-items: center;

                padding: 0 32px;

                border-bottom: 1px solid #E5E7EB;

                position: sticky;
                top: 0;
                z-index: 100;
            }

            .navbar-title{
                font-size: 22px;
                font-weight: 800;
                color: #1F2937;
            }

            .navbar-right{
                display: flex;
                align-items: center;
                gap: 16px;
            }
            
            .navbar-heading{
                display: flex;
                flex-direction: column;
                gap: 4px;
            }

            .navbar-subtitle{
                font-size: 14px;
                color: #767587;
                font-weight: 500;
            }  

            .navbar-actions{
                display: flex;
                align-items: center;
            }

            .btn-reset{
                display: inline-flex;
                align-items: center;
                gap: 8px;

                padding: 10px 16px;

                border-radius: 10px;

                background: #EEF2FF;
                color: #4338CA;

                text-decoration: none;
                font-size: 14px;
                font-weight: 600;

                transition: all .2s ease;
            }

            .btn-reset:hover{
                background: #DDE5FF;
            }            
            /* ================= BUTTON ================= */
            .btn-primary-custom {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                padding: 14px 22px;
                border: none;
                border-radius: 14px;
                background: linear-gradient(135deg, #0606CD, #4338CA);
                color: white;
                font-size: 14px;
                font-weight: 600;
                cursor: pointer;
                transition: 0.25s;
                box-shadow: 0 8px 20px rgba(67,56,202,0.22);
            }

            .btn-primary-custom:hover {
                transform: translateY(-2px);
                color: white;
            }

            .btn-outline-custom {
                padding: 12px 18px;
                border: 1px solid #D1D5DB;
                border-radius: 12px;
                background: white;
                color: #292929;
                font-weight: 600;
                transition: 0.2s;
            }

            .btn-outline-custom:hover { background: #F4F4F5; }

            /* ================= CARD ================= */
            .card {
                padding: 24px;
                margin-bottom: 24px;
                background: white;
                border-radius: 24px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.04);
                transition: 0.3s;
            }

            .card-title {
                display: flex;
                align-items: center;
                gap: 12px;
                padding-bottom: 16px;
                
                font-size: 18px;
                font-weight: 800;
                border-bottom: 1px solid #ECECEC;
            }

            .card-title.perusahaan-page{
                border-bottom: none;
                padding-bottom: 0;
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

            .active-card{
                border: 2px solid #2563EB;
                background: #EFF6FF;
                transform: translateY(-4px);
                box-shadow: 0 10px 20px rgba(37,99,235,.15);
            }

            .active-card .stat-label,
            .active-card .stat-number{
                color: #2563EB;
            }            
            /* ================= FORM ================= */
            .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
            .form-group { margin-bottom: 20px; }

            .form-label { display: block; margin-bottom: 10px; font-size: 14px; font-weight: 700; color: #333; }
            label { display: block; margin-bottom: 10px; font-size: 14px; font-weight: 700; color: #333; }

            .form-input, .form-select, .form-textarea,
            .input, .select, .textarea {
                width: 100%;
                border: 1px solid #E5E7EB;
                border-radius: 14px;
                padding: 14px 16px;
                font-size: 14px;
                outline: none;
                transition: 0.2s;
            }

            .form-input:focus, .form-select:focus, .form-textarea:focus,
            .input:focus, .select:focus, .textarea:focus {
                border-color: #0606CD;
                box-shadow: 0 0 0 4px rgba(6,6,205,0.08);
            }

            .form-textarea, .textarea { min-height: 150px; resize: none; }

            /* ================= TABLE ================= */
            .table-card { overflow: hidden; }

            .table-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 18px;
                border-bottom: 1px solid #ECECEC;
            }

            /* .table-title { font-size: 28px; font-weight: 800; } */

            .search-box {
                width: 350px;
                padding: 14px;
                background: #F4F6FB;
                border: none;
                border-radius: 14px;
                font-size: 14px;
                outline: none;
            }

            .table-title{
                font-size: 18px;
                font-weight:600;
                color: #7b7b89;
            }

            th { padding: 18px 24px; text-align: left; font-size: 12px; font-weight: 700; letter-spacing: 1px; color: #6B7280; }
            td { padding: 22px 24px; font-size: 14px; border-top: 1px solid #F1F1F1; }
            tbody tr:hover { background: #FAFBFF; }

            td .tag-more {
                display: inline-flex;
                align-items: center;
                padding: 6px 12px;
                border-radius: 999px;
                border: 1px dashed #A5B4FC;
                background-color: #F0F2FF;
                color: #4338CA;
                font-size: 12px;
                font-weight: 400;
                cursor: help;
                white-space: nowrap;
            }

            td .tag-more:hover { background-color: #E0E4FF; }

            /* ================= COMPANY ================= */
            .company { display: flex; align-items: center; gap: 14px; }

            .company-logo {
                width: 48px; height: 48px;
                display: flex; justify-content: center; align-items: center;
                border-radius: 14px; background: #EEF2FF;
                overflow: hidden; flex-shrink: 0;
                color: #4338CA; font-weight: 700;
            }

            .company-logo img { width: 100%; height: 100%; object-fit: cover; }

            /* ================= BADGES ================= */
            .posisi-wrapper { display: flex; flex-wrap: wrap; gap: 8px; max-width: 280px; }

            .badge-posisi { padding: 6px 12px; background: #EEF2FF; color: #4338CA; border-radius: 20px; font-size: 12px; font-weight: 600; white-space: nowrap; }
            .badge-more   { padding: 6px 12px; background: #F3F4F6; color: #6B7280; border-radius: 20px; font-size: 12px; font-weight: 600; }

            /* ================= TOGGLE SWITCH ================= */
            .switch-toggle { position: relative; display: inline-block; width: 52px; height: 28px; }
            .switch-toggle input { opacity: 0; width: 0; height: 0; }

            .switch-slider {
                position: absolute; top: 0; left: 0; right: 0; bottom: 0;
                cursor: pointer; background: #D1D5DB; border-radius: 999px; transition: 0.3s;
            }

            .switch-slider::before {
                content: '';
                position: absolute; width: 22px; height: 22px; left: 3px; top: 3px;
                background: white; border-radius: 50%; transition: 0.3s;
                box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            }

            .switch-toggle input:checked + .switch-slider { background: #22C55E; }
            .switch-toggle input:checked + .switch-slider::before { transform: translateX(24px); }

            /* ================= ACTION BUTTONS ================= */
            .action-buttons { display: flex; justify-content: center; gap: 10px; }
            .action-buttons form { margin: 0; }

            .action-btn {
                width: 38px; height: 38px;
                display: flex; justify-content: center; align-items: center;
                border: none; border-radius: 12px; font-size: 15px; cursor: pointer; transition: 0.25s;
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
            .editor-toolbar {
                display: flex; gap: 18px;
                padding: 14px 16px;
                border: 1px solid #E5E7EB; border-bottom: none;
                border-radius: 14px 14px 0 0;
            }

            .editor-area {
                min-height: 160px; padding: 18px;
                border: 1px solid #E5E7EB;
                border-radius: 0 0 14px 14px;
                color: #9CA3AF;
            }

            /* ================= UPLOAD ================= */
            .upload-box { padding: 40px 20px; border: 2px dashed #D1D5DB; border-radius: 18px; text-align: center; }

            .upload-icon {
                width: 56px; height: 56px;
                display: flex; justify-content: center; align-items: center;
                margin: auto auto 14px;
                border-radius: 50%; background: #EEF2FF;
                color: #1212ff; font-size: 20px;
            }

            .upload-title { margin-bottom: 4px; color: #1212ff; font-weight: 700; }
            .upload-sub   { font-size: 12px; color: #8B8B8B; }

            /* ================= RANGE ================= */
            .range-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
            .range-value  { color: #1212ff; font-weight: 700; }
            .range-input  { width: 100%; }

            /* ================= SWITCH WRAPPER ================= */
            .switch-wrapper {
                display: flex; justify-content: space-between; align-items: center;
                padding: 22px; border: 1px solid #ECECEC; border-radius: 18px;
            }

            .switch-text h4 { margin-bottom: 6px; }
            .switch-text p  { color: #777; font-size: 14px; }

            /* ================= BOTTOM ACTIONS ================= */
            .bottom-actions { display: flex; justify-content: space-between; align-items: center; margin-top: 20px; }

            /* ================= BUTTON ================= */
            .btn {
                padding: 14px 26px; border: none; border-radius: 14px;
                font-size: 14px; font-weight: 700; cursor: pointer; transition: 0.2s;
            }

            .btn:hover     { transform: translateY(-2px); }
            .btn-outline   { background: white; border: 1px solid #D1D5DB; }
            .btn-secondary { background: #DDE5FF; color: #1212ff; }
            .btn-primary   { background: #1212ff; color: white; }

            /* ================= PAGINATION ================= */
            .pagination-wrapper {
                display: flex; justify-content: space-between; align-items: center;
                padding: 22px 24px; background: #FAFAFA; border-top: 1px solid #ECECEC;
            }

            .pagination-wrapper .pagination { justify-content: flex-end; }

            .pagination-buttons { display: flex; align-items: center; gap: 10px; }

            .page-btn {
                min-width: 38px; height: 38px;
                display: flex; justify-content: center; align-items: center;
                padding: 0 14px; border: 1px solid #E5E7EB; border-radius: 10px;
                background: white; color: #292929; font-size: 14px; font-weight: 600; transition: 0.2s;
            }

            .page-btn:hover    { background: #F4F4F5; color: #0606CD; }
            .page-btn.active   { background: #0606CD; border-color: #0606CD; color: white; }
            .page-btn.disabled { opacity: 0.5; cursor: not-allowed; pointer-events: none; }

            /* ================= CONTENT GRID ================= */
            .content-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; }

            .type-group { display: flex; gap: 12px; }

            .type-btn {
                flex: 1; border: 1px solid #E5E7EB; background: white;
                border-radius: 14px; padding: 16px; font-weight: 700; cursor: pointer; transition: 0.2s;
            }

            .type-btn.active { background: #1212ff; color: white; border-color: #1212ff; }

            /* ================= PAGE HEADER ================= */
            .page-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 16px;
                margin-bottom: 24px;
            }

            .page-title    { font-size: 22px; font-weight: 800; }
            .page-subtitle { color: #767587; font-size: 15px; }

            /* ================= RESPONSIVE ================= */
            @media (max-width: 992px) {
                .content-grid { grid-template-columns: 1fr; }
                .form-row     { grid-template-columns: 1fr; }
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

        .dashboard-chart-header h3{
            margin:0;
            font-size:26px;
            font-weight:800;
            color:#111827;
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

            <!-- ===== SIDEBAR ===== -->
            <aside class="sidebar" id="sidebar">
                <div class="sidebar-top">
                    <div class="sidebar-brand-box">
                        <div class="sidebar-logo-title">
                            <span class="logo-text-sm">RekomIn</span>
                        </div>
                        <!-- Tombol toggle tetap di dalam sidebar brand box -->
                        <button type="button" class="toggle-sidebar-btn" id="toggleSidebar" title="Toggle Sidebar">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>

                    <div class="menu">
                        <a href="{{ route('dashboard.index') }}"
                           class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                           data-tooltip="Dashboard">
                            <div class="menu-icon"><i class="fa-solid fa-chart-line"></i></div>
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
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none;">
                        @csrf
                    </form>
                    <a href="#" class="logout-btn"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="menu-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                        <span class="menu-text">Logout</span>
                    </a>
                </div>
            </aside>

            <!-- ===== MAIN CONTENT ===== -->
            <main class="main" id="mainContent">

            <!-- TOP NAVBAR -->
            <div class="top-navbar">

                <div class="navbar-heading">

                    <div class="navbar-title">
                        @yield('topbar_title')
                    </div>

                    <div class="navbar-subtitle">
                        @yield('topbar_subtitle')
                    </div>

                </div>

                <div class="navbar-actions">
                    @if(request('filter') || request('bidang') || request('industri'))
                        <a href="{{ route('dashboard.index') }}" class="btn-reset">
                            <i class="fa-solid fa-rotate-left"></i>
                            Reset Filter
                        </a>
                    @endif
                </div>

            </div>
                <div class="main-container">
                    @yield('content')
                </div>
            </main>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // Jalankan SEBELUM DOMContentLoaded agar tidak ada flash/lompatan layout
            (function () {
                if (localStorage.getItem('sidebarCollapsed') === 'true') {
                    document.getElementById('sidebar').classList.add('collapsed');
                    document.getElementById('mainContent').classList.add('collapsed-mode');
                }
            })();

            document.addEventListener('DOMContentLoaded', function () {

                // --- LOGIC 1: TOGGLE SIDEBAR (icon-only mode) ---
                const toggleBtn   = document.getElementById('toggleSidebar');
                const sidebar     = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');

                if (toggleBtn && sidebar && mainContent) {
                    toggleBtn.addEventListener('click', function () {
                        sidebar.classList.toggle('collapsed');
                        mainContent.classList.toggle('collapsed-mode');

                        // Simpan state ke localStorage agar tetap saat pindah halaman
                        const isCollapsed = sidebar.classList.contains('collapsed');
                        localStorage.setItem('sidebarCollapsed', isCollapsed);
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