<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

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
            width: 360px;
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
            box-shadow: 0 0 6px rgba(79,70,229,0.4);
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

        .register-link {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #4f46e5;
            text-decoration: none;
            font-size: 14px;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .msg {
            background: #fee2e2;
            padding: 10px;
            border-left: 4px solid #ef4444;
            color: #991b1b;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="card">

    <h2>Login</h2>

    @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input name="email" placeholder="Email Address" required>

        <input name="password" type="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <a class="register-link" href="/register">Create New Account</a>

</div>

</body>
</html>
