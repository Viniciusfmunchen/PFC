<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Soka Animes - {{ $title }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <nav class="col-3 side navbar-expand-lg navbar-dark bg-dark p-4 bg-dark sticky-top">
                <a href="#" class="navbar-brand"><h2 class="text-uppercase fw-bold">🐵 Soka Animes</h2> </a>
                <div class="navbar-toggler fixed-bottom bg-dark">
                    <span class="fa-solid fa-home me-2"></span>
                    <span class="fa-solid fa-user me-2"></span>
                    <span class="fa-solid fa-search me-2"></span>
                </div>
                <div class="collapse navbar-collapse mt-3">
                    <ul class="navbar-nav text-light d-block">
                        <li class="nav-item rounded-pill my-3">
                            <a href="{{route('welcome')}}" class="nav-link"><span
                                    class="fa-solid fa-home me-2"></span> Pagina Inicial</a>
                        </li>
                        <li class="nav-item rounded-pill my-3">
                            <a href="{{route('works.index')}}" class="nav-link"><span
                                    class="fa-solid fa-search me-2"></span> Pesquisar</a>
                        </li>
                        <li class="nav-item rounded-pill my-3">
                            <a href="{{route('home')}}" class="nav-link"><span class="fa-solid fa-user me-2"></span>
                                Perfil</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="text-decoration-none text-white btn btn-primary rounded-pill px-5 py-2 mt-5" href="#"><b>TATAKAE!</b></a>
                </div>
                <div class="dropdown text-light d-flex justify-content-center mt-5">
                    <button class="btn btn-dark rounded-pill dropdown-toggle" type="button" id="dropMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        @guest @if(Route::has('login')||Route::has('register')) Entrar @endif @else {{Auth::user()->name}}@endguest
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropMenu">
                        @guest()
                            @if(Route::has('login'))
                                <li>
                                    <a href="{{route('login')}}" class="dropdown-item">Login</a>
                                </li>
                            @endif

                            @if(Route::has('register'))
                                    <li>
                                        <a href="{{route('register')}}" class="dropdown-item">Cadastro</a>
                                    </li>
                                @endif
                        @else
                            <li>
                                <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                                <form action="{{route('logout')}}" id="logout-form" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <div class="col-6 bg-dark">
                {{$slot}}
            </div>
            <div class="col-3 bg-warning side sticky-top">

            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/4159a3a088.js" crossorigin="anonymous"></script>
</body>
</html>
