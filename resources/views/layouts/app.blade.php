<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-POP Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <div class="nav-left">
            <a href="{{ route('home') }}" class="logo">KPOP Profiles</a>
        </div>
        <div class="nav-right">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('artists.index') }}">Artist</a>
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endguest
        </div>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>