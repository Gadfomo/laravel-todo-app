<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do App</title>
    <!-- Add some basic CSS or link to an external CSS framework -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        .container { max-width: 800px; margin: auto; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Flash messages -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Content from child views -->
        @yield('content')
    </div>
</body>
</html>
