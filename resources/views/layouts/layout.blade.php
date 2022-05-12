<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-control" content="public">
        <title>@yield("title")</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-icons.mini.css') }}" rel="stylesheet" >
        <script src="{{ asset('js/jquery.lazyload.min.js') }}"></script>
        @livewireStyles
        <script>
            jQuery(function($) {
                $("img").lazyload();
            });
        </script>
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
                            <a class="nav-link" aria-current="page" href="{{route('posts.index')}}">
                                <i class="bi bi-house-fill"></i> Home
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @Auth
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{route('posts.add')}}">
                                <i class="bi bi-plus-circle"></i> Add Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.edit')}}"><i class="bi bi-pencil-fill"></i> Edit User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index.logout')}}"><i class="bi bi-door-closed"></i> Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index.login')}}"><i class="bi bi-door-open-fill"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index.register')}}"><i class="bi bi-book-half"></i> Register</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield("body")
        @livewireScripts
        <script type="module">import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';</script>
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html>
