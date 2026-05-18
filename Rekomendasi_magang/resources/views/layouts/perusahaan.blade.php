<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'InternPortal Admin')</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

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

            background:linear-gradient(
                180deg,
                #08084A 0%,
                #10106B 100%
            );

            color:white;

            position:fixed;
            top:0;
            left:0;
            bottom:0;

            display:flex;
            flex-direction:column;
            justify-content:space-between;

            box-shadow:4px 0 20px rgba(0,0,0,0.08);

            z-index:1000;
        }

        .sidebar-top{
            padding:24px 18px;
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

            border-radius:14px;

            background:white;

            display:flex;
            justify-content:center;
            align-items:center;

            color:#0606CD;
            font-weight:800;
        }

        .logo-text{
            font-size:22px;
            font-weight:800;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:10px;
        }

        .menu-item{
            display:flex;
            align-items:center;
            gap:14px;

            padding:14px 16px;

            border-radius:14px;

            color:rgba(255,255,255,0.75);

            transition:0.25s;
            font-weight:500;
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

        .sidebar-bottom{
            padding:20px;

            border-top:1px solid rgba(255,255,255,0.1);
        }

        .logout-btn{
            display:flex;
            align-items:center;
            gap:12px;

            padding:12px 15px;

            color:#ff6b6b;

            border-radius:12px;

            transition:0.25s;
            font-weight:600;
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
            font-weight:800;
            color:#111827;
        }

        .topbar-subtitle{
            font-size:13px;
            color:#6B7280;
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
            font-size:18px;
            font-weight:700;
            color:#111827;
        }

        .admin-mini{
            width:42px;
            height:42px;

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
            font-weight:800;

            margin-bottom:6px;
        }

        .page-subtitle{
            color:#767587;
            font-size:15px;
        }

        /* ================= BUTTON ================= */

        .btn-primary-custom{
            border:none;

            background:linear-gradient(
                135deg,
                #0606CD,
                #4338CA
            );

            color:white;

            padding:14px 22px;

            border-radius:14px;

            font-size:14px;
            font-weight:600;

            cursor:pointer;

            transition:0.25s;

            display:inline-flex;
            align-items:center;
            gap:10px;

            box-shadow:0 8px 20px rgba(67,56,202,0.22);
        }

        .btn-primary-custom:hover{
            transform:translateY(-2px);
            color:white;
        }

        .btn-outline-custom{
            border:1px solid #D1D5DB;

            background:white;

            padding:12px 18px;

            border-radius:12px;

            font-weight:600;

            color:#292929;

            transition:0.2s;
        }

        .btn-outline-custom:hover{
            background:#F4F4F5;
        }

       /* ================= STATS ================= */

        .stats{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:22px;

            margin-bottom:30px;
        }

        .card{
            background:white;

            border-radius:24px;

            padding:24px;

            box-shadow:0 6px 20px rgba(0,0,0,0.04);

            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-4px);
            box-shadow:0 12px 28px rgba(0,0,0,0.08);
        }

        .stat-card{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 16px;
            gap:10px;
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

        /* ================= PAGINATION ================= */
        .pagination-wrapper{
            padding:22px 24px;
            background:#FAFAFA;

            display:flex;
            align-items:center;
            justify-content:space-between;

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

            padding:0 14px;

            border-radius:10px;

            border:1px solid #E5E7EB;

            display:flex;
            justify-content:center;
            align-items:center;

            background:white;

            text-decoration:none;
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
            color:white;
            border-color:#0606CD;
        }

        .page-btn.disabled{
            opacity:0.5;
            cursor:not-allowed;
            pointer-events:none;
        }

        /* ================= FORM ================= */

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

        .form-row{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        }

        /* ================= TABLE ================= */

        .table-card{
            overflow:hidden;
        }

        .table-header{
            padding:24px;

            border-bottom:1px solid #ECECEC;

            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .table-title{
            font-size:22px;
            font-weight:800;
        }

        .search-box{
            width:350px;

            background:#F4F6FB;

            border:none;
            outline:none;

            padding:14px;

            border-radius:14px;

            font-size:14px;
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

            color:#6B7280;

            letter-spacing:1px;
        }

        td{
            padding:22px 24px;

            border-top:1px solid #F1F1F1;

            font-size:14px;
        }

        tbody tr:hover{
            background:#FAFBFF;
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

            border-radius:14px;

            background:#EEF2FF;

            display:flex;
            justify-content:center;
            align-items:center;

            color:#4338CA;
            font-weight:700;
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

        .badge-yellow{
            background:#FEF3C7;
            color:#92400E;
        }

        /* ================= SWITCH ================= */

        .switch{
            width:48px;
            height:26px;

            background:#0606CD;

            border-radius:999px;

            position:relative;
        }

        .switch::after{
            content:'';

            width:20px;
            height:20px;

            border-radius:50%;

            background:white;

            position:absolute;

            top:3px;
            right:3px;
        }

        .switch.off{
            background:#D1D5DB;
        }

        .switch.off::after{
            left:3px;
        }

        /* ================= ACTION BUTTON ================= */

        .action-buttons{
            display:flex;
            justify-content:center;
            gap:10px;
        }

        .action-btn{
            width:38px;
            height:38px;

            border:none;

            border-radius:12px;

            display:flex;
            justify-content:center;
            align-items:center;

            cursor:pointer;

            transition:0.25s;

            font-size:15px;
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

        /* ================= RESPONSIVE ================= */

        @media(max-width:992px){

            .sidebar{
                display:none;
            }

            .main{
                margin-left:0;
            }

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

    </style>

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

</body>
</html>