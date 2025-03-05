<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { max-width: 300px; margin: auto; }
        input { display: block; width: 100%; padding: 8px; margin-bottom: 10px; }
        button { background: blue; color: white; padding: 8px 12px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>

    @if ($errors->any()) 
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>            
        @endforeach
    </ul>
@endif

</body>
</html>
