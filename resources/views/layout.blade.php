<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('libraries.styles')
    <title>Book Stock MS</title>
</head>
<body>  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/home') }}">Books</a>
                </li>
                <li class="nav-item {{ Request::is('book-lendings') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/book-lendings') }}">Book Lendings</a>
                </li>
            </ul>
        </div>
    </nav>
        @yield('content')
        @include('libraries.scripts')
</body>
</html>