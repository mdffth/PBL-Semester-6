<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', sans-serif;
        }

        body{
            background-color:#f5f6fa;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .login-container{
            width:380px;
            background:#fff;
            padding:30px;
            border-radius:14px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        .login-title{
            text-align:center;
            margin-bottom:25px;
        }

        .login-title h2{
            color:#111827;
            margin-bottom:8px;
        }

        .login-title p{
            color:#7C8299;
            font-size:14px;
        }

        /* LOGIN LABEL */
        .toggle-btn{
            display:flex;
            margin-bottom:25px;
            border-radius:8px;
            overflow:hidden;
            border:1px solid #ddd;
        }

        .toggle-btn button{
            width:100%;
            padding:12px;
            border:none;
            background:#0242C4;
            color:#fff;
            font-weight:bold;
            font-size:14px;
            cursor:default;
        }

        .form-group{
            margin-bottom:18px;
        }

        .form-group label{
            display:block;
            margin-bottom:8px;
            font-size:14px;
            color:#374151;
            font-weight:500;
        }

        .form-control{
            width:100%;
            padding:12px;
            border-radius:8px;
            border:1px solid #d1d5db;
            outline:none;
            transition:0.2s;
        }

        .form-control:focus{
            border-color:#0242C4;
            box-shadow:0 0 0 3px rgba(2,66,196,0.1);
        }

        .btn-login{
            width:100%;
            padding:12px;
            background:#0242C4;
            border:none;
            border-radius:8px;
            color:white;
            font-weight:600;
            cursor:pointer;
            margin-top:10px;
            transition:0.2s;
        }

        .btn-login:hover{
            background:#0136A0;
        }

        .footer-text{
            margin-top:18px;
            text-align:center;
            font-size:13px;
            color:#7C8299;
        }

        /* ERROR ALERT */
        .alert-error{
            background:#FEE2E2;
            color:#B91C1C;
            border:1px solid #FCA5A5;
            padding:12px;
            border-radius:8px;
            margin-bottom:18px;
            font-size:14px;
        }

        /* VALIDATION ERROR */
        .validation-error{
            color:#dc2626;
            font-size:13px;
            margin-top:6px;
        }

    </style>

</head>
<body>

<div class="login-container">

    {{-- TITLE --}}
    <div class="login-title">

        <h2>
            Login Admin
        </h2>

        <p>
            Masuk untuk mengelola dashboard perusahaan
        </p>

    </div>

    {{-- ERROR LOGIN --}}
    @if(session('error'))

        <div class="alert-error">

            {{ session('error') }}

        </div>

    @endif


    {{-- FORM LOGIN --}}
    <form method="POST"
          action="{{ route('login') }}">

        @csrf


        {{-- EMAIL --}}
        <div class="form-group">

            <label>
                Email
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan email"
                   value="{{ old('email') }}"
                   required>

            @error('email')

                <div class="validation-error">
                    {{ $message }}
                </div>

            @enderror

        </div>


        {{-- PASSWORD --}}
        <div class="form-group">

            <label>
                Password
            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   required>

            @error('password')

                <div class="validation-error">
                    {{ $message }}
                </div>

            @enderror

        </div>


        {{-- BUTTON LOGIN --}}
        <button type="submit"
                class="btn-login">

            Login

        </button>

    </form>


    {{-- FOOTER --}}
    <div class="footer-text">

        InternPath © 2026

    </div>

</div>

</body>
</html>