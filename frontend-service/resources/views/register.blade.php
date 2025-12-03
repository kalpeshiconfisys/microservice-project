<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            width: 380px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 5px rgba(79,70,229,0.4);
        }

        button {
            width: 100%;
            background: #4f46e5;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #4338ca;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
            display: block;
            color: #4f46e5;
            text-decoration: none;
            font-size: 14px;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .msg {
            background: #d1fae5;
            padding: 10px;
            border-left: 4px solid #10b981;
            color: #065f46;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="card">

    <h2>Create Account</h2>

    @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
    @endif

    <form method="POST" action="/register">
        @csrf

        <input name="name" placeholder="Full Name" required>

        <input name="email" placeholder="Email Address" required>

        <input name="password" type="password" placeholder="Password" required>

        <input name="password_confirmation" type="password" placeholder="Confirm Password" required>

        <button type="submit">Register</button>
    </form>

    <a class="login-link" href="/login">Already have an account? Login</a>

</div>

</body>
</html>
