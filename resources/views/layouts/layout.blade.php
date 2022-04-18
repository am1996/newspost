<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield("title")</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-icons.mini.css') }}" rel="stylesheet" >
        @livewireStyles
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('posts.index')}}">Newspost</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">
                                <i class="bi bi-house-fill"></i> Home
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @Auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.edit')}}"><i class="bi bi-pencil-fill"></i> Edit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.logout')}}"><i class="bi bi-door-closed"></i> Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.login')}}"><i class="bi bi-door-open-fill"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.register')}}"><i class="bi bi-book-half"></i> Register</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield("body")
        @livewireScripts
    </body>
</html>
