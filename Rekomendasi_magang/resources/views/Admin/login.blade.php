<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 380px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .toggle-btn {
            display: flex;
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .toggle-btn button {
            flex: 1;
            padding: 10px;
            border: none;
            background: #f1f1f1;
            cursor: pointer;
            color: #7C8299;
        }

        .toggle-btn .active {
            background: #0242C4;
            color: #fff;
            font-weight: bold;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            color: #7C8299;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #0242C4;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #0336a6;
        }

        .footer-text {
            margin-top: 15px;
            font-size: 13px;
            color: #7C8299;
        }

        .footer-text a {
            color: #0242C4;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login to manage your account</h2>

    <div class="toggle-btn">
        <button class="active">Login</button>
        <button>Signup</button>
    </div>

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email address" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button type="submit" class="btn-login">Continue</button>
    </form>

    <div class="footer-text">
        Already have an account? <a href="#">Login</a>
    </div>

    <div class="footer-text" style="font-size: 11px;">
        By continuing, you agree to our Terms of Service and Privacy Policy
    </div>
</div>

</body>
</html>