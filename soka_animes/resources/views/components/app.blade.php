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
<body class="bg-dark text-light">
@if(session('success'))
    <div class="alert alert-primary border border-primary">
        {{session('success')}}
    </div>
@endif
    <div class="container">
        <div class="row">
            <nav class="col-3 side navbar-expand-lg navbar-dark bg-dark p-4 bg-dark sticky-top border-end border-secondary">
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
            <div class="col-3 bg-dark side sticky-top border-start border-secondary">
                <div class="search-box input-group rounded-pill px-3 py-1 mt-2">
                    <span class="input-group-append d-flex align-items-center">
                        <button typeof="submit" class="btn btn-info p-2" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    <input class="input-dark-search form-control" type="search" id="search" name="search" autocomplete="off">
                </div>
                <ul class="text-light bg-secondary navbar-nav rounded-3 mt-2" >
                    <div class="d-none" id="searched-show">
                        <li class="nav-item p-3 border-bottom border-info">
                            <div class="row">
                                <div class="col-2">
                                    <div class="image-post bg-info rounded-circle d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-search"></i>
                                    </div>
                                </div>
                                <div class="col-10 d-flex align-items-center gx-5">
                                    <span class="fw-bold" id="searched"></span>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div id="search-results">

                    </div>

                </ul>
            </div>
        </div>

    </div>
    <script src="https://kit.fontawesome.com/4159a3a088.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.alert-primary').delay(3000).fadeOut();
        });
        

        $('#search').on('keyup', function (){
            $search = $(this).val();
            if($(this).val().length > 0){
                    $('#searched').html($(this).val())
                    $('#searched-show').removeClass('d-none');
                } else {
                    $('#searched-show').addClass('d-none');
                }
            $.ajax({
                type: 'GET',
                url: '{{route('search')}}',
                data: {'search':$search},

                success:function(data){
                    $('#search-results').html(data);
                }
            });
        });
    </script>
</body>
</html>
