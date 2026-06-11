<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/login_page.css') }}">

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