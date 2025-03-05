<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { max-width: 300px; margin: auto; }
        input { display: block; width: 100%; padding: 8px; margin-bottom: 10px; }
        button { background: green; color: white; padding: 8px 12px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
</body>
</html>
