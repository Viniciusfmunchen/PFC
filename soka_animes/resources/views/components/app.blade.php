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

<body class="text-light bg-dark">
    @if (session('success'))
        <div class="alert alert-primary border border-primary">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <nav class="col-3 side navbar-expand-lg navbar-dark p-4 bg-dark sticky-top border-end border-info">
                <a href="{{route('home')}}" class="navbar-brand">
                    <img class="img-fluid" src="{{'/img/site-images/logo-soka.png'}}">
                </a>
                <div class="navbar-toggler fixed-bottom bg-dark">
                    <span class="fa-solid fa-home me-2"></span>
                    <span class="fa-solid fa-user me-2"></span>
                    <span class="fa-solid fa-search me-2"></span>
                </div>
                <div class="collapse navbar-collapse mt-3">
                    <ul class="navbar-nav text-light d-block">
                        @auth
                            @if(!Auth::user()->isAdmin())
                                <li class="nav-item rounded-pill my-3">
                                    <a href="{{ route('home') }}" class="nav-link @if(Route::is('home')) text-white @endif"><span
                                            class="fa-solid fa-home me-2 "></span> Pagina Inicial</a>
                                </li>
                                <li class="nav-item rounded-pill my-3">
                                    <a href="{{ route('profile') }}" class="nav-link @if(Route::is('profile')) text-white @endif">@if(Auth::user()->isAdmin())<span class="fa-solid fa-user-plus me-2">@else<span class="fa-solid fa-user me-2">@endif</span>
                                            Perfil</a>
                                </li>
                            @endif

                        @endauth
                        <li class="nav-item rounded-pill my-3">
                            <a href="{{ route('search.index') }}" class="nav-link"><span class="fa-solid fa-search me-2"></span> Pesquisar</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-center">
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a class="text-decoration-none text-white btn btn-primary rounded-pill px-5 py-2 mt-5 fw-bold" href="{{route('works.create')}}">Adicionar Obra</a>
                        @else
                            <button type="button" class="text-decoration-none text-white btn btn-primary rounded-pill px-5 py-2 mt-5 fw-bold" data-bs-toggle="modal" data-bs-target="#postModal">
                                TATAKAE!
                            </button>
                        @endif
                    @endauth
                </div>
                <div class="d-flex justify-content-center">
                    <div class="dropup-center text-light d-flex justify-content-center mt-5"
                         style="position:absolute; bottom: 20px">
                        <button
                            class=" dropdown-toggle btn btn-dark rounded-pill d-flex justify-content-center align-items-center"
                            type="button" id="dropMenu"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @guest
                                @if (Route::has('login') || Route::has('register'))
                                    <b>Entrar</b>
                                @endif
                            @else
                                <div class="little-profile">
                                    <div class="pro-img-icon-no-line d-inline me-1"><img
                                            src="{{'/img/profile-images/' . Auth::user()->profile_image}}"></div>
                                    <div class=" d-inline"><b>{{Auth::user()->name}}</b></div>
                                </div>
                            @endguest
                        </button>
                        <ul class="dropdown-menu bg-secondary" aria-labelledby="dropMenu">
                            @guest()
                                @if (Route::has('login'))
                                    <li>
                                        <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}" class="dropdown-item">Cadastro</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                                    <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col-lg-6 col-sm-12 bg-dark" style="padding: 0">
                {{ $slot }}
            </div>
            <div class="col-3 bg-dark side border-start border-info position-sticky sticky-top">
                @if(!Route::is('search.index', 'search.expand'))
                    <div class="search-box input-group rounded-pill px-3 py-1 mt-2 w-100">
                        <span class="input-group-append d-flex align-items-center">
                            <button typeof="submit" class="btn search-box p-2" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        <input class="input-dark-search form-control" type="text" id="search" name="search"
                            autocomplete="off">
                    </div>
                    <div class="position-relative">
                        <div id="searched-show" class="collapse rounded-3 mt-2 bg-info position-absolute" style="width: 100%">
                            <a id="expand-search" class="text-decoration-none text-light" href=""><div class="border-bottom border-secondary p-3">
                                    <span class="rounded-circle d-flex justify-content-start align-items-center"><i class="fa-solid fa-search p-3 bg-secondary rounded-circle me-2"></i><span class="fw-bold" id="searched"></span></span>
                            </div></a>
                            <div id="loading" class="progress d-none">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                            <div id="search-results" style="width:100%; max-height: 300px; overflow: auto">

                            </div>
                        </div>
                    </div>
                @endif
                <div class="bg-secondary mt-3 rounded-3 border border-info" >
                    <div class="rounded-top d-flex bg-info p-1 d-flex justify-content-center align-items-center border-bottom border-primary">
                        <h5>Top Obras</h5>
                    </div>
                    <div class="p-3" style="height: 200px; overflow: auto">
                            @php $i = 1 @endphp
                        <div class="row">
                            @foreach($topWorks as $work)
                                    <div class="col-6 p-3 border-bottom border-dark @if($i%2 == 0) border-start @endif">
                                        <div class="d-flex justify-content-center">
                                            <img class="rounded-3 border border-primary img-fluid" src="{{$work->image}}" alt="" style="max-width: 75%; max-height: 75%"><br>
                                        </div>
                                        <div class="d-flex justify-content-center text-center">
                                            <p><b>#{{$i}}: </b>{{$work->name}}</p>
                                        </div>
                                    </div>
                                @php $i++ @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="bg-secondary mt-3 rounded-3 border border-info" >
                    <div class="rounded-top d-flex bg-info p-1 d-flex justify-content-center align-items-center border-bottom border-primary">
                        <h5>Top Personagens</h5>
                    </div>
                    <div class="p-3" style="height: 200px; overflow: auto">
                        @php $i = 1 @endphp
                        <div class="row">
                            @foreach($topCharacters as $character)
                                <div class="col-6 p-2 border-bottom border-dark @if($i%2 == 0) border-start @endif">
                                        <div class="d-flex justify-content-center">
                                            <img class="rounded-3 border border-primary img-fluid" src="{{$character->image}}" alt="" style="max-width: 75%; max-height: 75%"><br>
                                        </div>
                                        <div class="d-flex justify-content-center text-center">
                                            <p style="padding: 0; margin: 0"><b>#{{$i}}: </b>{{$character->name}}</p>
                                        </div>
                                </div>
                                @php $i++ @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @auth
        <x-post-form :works="$works" :characters="$characters"></x-post-form>
    @endauth
    <script src="https://kit.fontawesome.com/4159a3a088.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.alert').delay(3000).fadeOut();
        });

        var $searchInput = $('#search');
        var timer;
        $searchInput.on('input', function() {
            $('#search-results').html('');
            clearTimeout(timer);
            search = $.trim($(this).val());
            if (search.length > 0) {
                $('#searched-show').collapse("show");
                $('#searched').html(search);
                var urlSearch = "{{ route('search.expand', '')}}/" + search;
                $('#expand-search').attr('href', urlSearch);
                $('#search-results').toggleClass('d-none', false);
                timer = setTimeout(function() {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('api.search') }}',
                        data: {
                            'search': search
                        },
                        beforeSend: function() {
                            $('#loading').toggleClass('d-none', false);
                        },
                        success: function(data) {
                            $('#loading').toggleClass('d-none', true);
                            $('#search-results').html(data);
                        }
                    });
                }, 300);
            } else {
                $('#searched-show').collapse("hide");
                $(' #search-results').toggleClass('d-none', true);
                $('#loading').addClass('d-none');
            }
        });

        const works = {!! json_encode($works->toArray(), JSON_HEX_TAG) !!};
        const characters = {!! json_encode($characters->toArray(), JSON_HEX_TAG) !!};

        $('#input-search-tags').on('input', function (){
            $searchedTag = $(this).val().toLowerCase();

            listedWorks.forEach(work =>{
                const isWorkVisible = work.name.toLowerCase().includes($searchedTag);
                if(isWorkVisible){
                    work.label.removeClass("d-none");
                    work.input.removeClass("d-none");
                } else {
                    work.label.addClass("d-none");
                    work.input.addClass("d-none");
                }
            });
            listedCharacters.forEach(character =>{
                const isWorkVisible = character.name.toLowerCase().includes($searchedTag);
                if(isWorkVisible){
                    character.label.removeClass("d-none");
                    character.input.removeClass("d-none");
                } else {
                    character.label.addClass("d-none");
                    character.input.addClass("d-none");
                }
            });
        });

        var listedWorks = works.map(work =>{
            var cloneTag = $('#template-tags').clone();
            var cloneButton = cloneTag.find('.btn-check');
            var cloneLabel = cloneTag.find('.label-check');
            cloneButton.attr({
               'name' : 'work[]',
               'id'   : 'work' + work.id
            });
            cloneButton.val(work.id);
            cloneLabel.attr({
               'for' : 'work' + work.id,
            });
            cloneLabel.text(work.name);
            if(work.type === '1'){
                cloneLabel.addClass('btn btn-outline-manga')
            }else{
                cloneLabel.addClass('btn btn-outline-anime')
            }
            $('#searchedTags').append(cloneButton);
            $('#searchedTags').append(cloneLabel);
            return {
                name: work.name, label: cloneLabel, input: cloneButton, type: work.type
            }
        });
        var listedCharacters = characters.map(character =>{
            var cloneTag = $('#template-tags').clone();
            var cloneButton = cloneTag.find('.btn-check');
            var cloneLabel = cloneTag.find('.label-check');
            cloneButton.attr({
                'name' : 'character[]',
                'id'   : 'character' + character.id
            });
            cloneButton.val(character.id);
            cloneLabel.attr({
                'for' : 'character' + character.id,
            });
            cloneLabel.text(character.name);
            cloneLabel.addClass('btn-outline-character');
            $('#searchedTags').append(cloneButton);
            $('#searchedTags').append(cloneLabel);
            return {
                name: character.name, label: cloneLabel, input: cloneButton
            }
        });

        var $checkboxes = $(".tags");
        var selectedTags = $("#selected-tags");

        $.each($checkboxes, function(index, checkbox){
            $(checkbox).on('click', function (){
                var labelText = $(checkbox).next().text();
                var labelClass = $(checkbox).next().attr('class');

                if ($(checkbox).prop("checked")) {
                    if(labelClass.includes("anime")){
                        selectedTags.append('<span class="badge bg-anime fe-bold text-dark" style="margin-inline: 3px">' + labelText + '<a href="" class="remove-badge"><i class="ms-1 fa-solid fa-x"></i></a></span>');
                    }else if(labelClass.includes("manga")){
                        selectedTags.append('<span class="badge bg-manga fe-bold text-dark" style="margin-inline: 3px">' + labelText + '<a href="" class="remove-badge"><i class="ms-1 fa-solid fa-x"></i></a></span>');
                    }else if(labelClass.includes("character")){
                        selectedTags.append('<span class="badge bg-character fe-bold text-dark" style="margin-inline: 3px">' + labelText + '<a href="" class="remove-badge"><i class="ms-1 fa-solid fa-x"></i></a></span>');
                    }
                }else{
                    selectedTags.find('span:contains("' + labelText + '")').remove();
                }
            });
        });
        $(document).on("click", ".remove-badge", function(e) {
            e.preventDefault();
            var badgeText = $(this).parent().text();
            var label = $('label:contains("' + badgeText + '")');
            var checkbox = label.prev('input[type="checkbox"]');
            checkbox.prop("checked", false);
            $(this).parent().remove();
        });

        $('.btn-like').on('click', function (){

        });

        $('.btn-like-post').on('click', function(){
            var postId = $(this).data('post-id');
            console.log(postId);
            var url = "{{ route('post.like', '')}}/" + postId;
            console.log(postId);
            $.ajax({
                type: 'POST',
                url: url,
                datatype: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.liked, response.likeCount)
                    $('#like-count' + postId).html(response.likeCount);

                    if(response.liked){
                        $('#like-heart' + postId).removeClass('fa-regular', 'text-danger');
                        $('#like-heart' + postId).addClass('fa-solid', 'text-danger');
                    }else{
                        $('#like-heart' + postId).removeClass('fa-solid', 'text-danger');
                        $('#like-heart' + postId).addClass('fa-regular', 'text-danger');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + textStatus);
                    console.dir(xhr);
                }
            });
        });
        $('.btn-like-comment').on('click', function(){
            var commentId = $(this).data('comment-id');
            console.log(commentId);
            var url = "{{ route('comment.like', '')}}/" + commentId;
            $.ajax({
                type: 'POST',
                url: url,
                datatype: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.liked, response.likeCount)
                    $('#like-count' + commentId).html(response.likeCount);

                    if(response.liked){
                        $('#like-heart' + commentId).removeClass('fa-regular', 'text-danger');
                        $('#like-heart' + commentId).addClass('fa-solid', 'text-danger');
                    }else{
                        $('#like-heart' + commentId).removeClass('fa-solid', 'text-danger');
                        $('#like-heart' + commentId).addClass('fa-regular', 'text-danger');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + textStatus);
                    console.dir(xhr);
                }
            });
        });
        $('.btn-like-work').on('click', function(){
            var workId = $(this).data('work-id');
            console.log(workId);
            var url = "{{ route('work.like', '')}}/" + workId;
            console.log(workId);
            $.ajax({
                type: 'POST',
                url: url,
                datatype: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.liked, response.likeCount)
                    $('#like-count' + workId).html(response.likeCount);

                    if(response.liked){
                        $('#like-heart' + workId).removeClass('fa-regular');
                        $('#like-heart' + workId).addClass('fa-solid');
                    }else{
                        $('#like-heart' + workId).removeClass('fa-solid');
                        $('#like-heart' + workId).addClass('fa-regular');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + textStatus);
                    console.dir(xhr);
                }
            });
        });
        $('.btn-like-character').on('click', function(){
            var characterId = $(this).data('character-id');
            console.log(characterId);
            var url = "{{ route('character.like', '')}}/" + characterId;
            console.log(characterId);
            $.ajax({
                type: 'POST',
                url: url,
                datatype: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.liked, response.likeCount)
                    $('#like-count' + characterId).html(response.likeCount);

                    if(response.liked){
                        $('#like-heart' + characterId).removeClass('fa-regular');
                        $('#like-heart' + characterId).addClass('fa-solid');
                        console.log(`like`)
                    }else{
                        $('#like-heart' + characterId).removeClass('fa-solid');
                        $('#like-heart' + characterId).addClass('fa-regular');
                        console.log('oi')
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + textStatus);
                    console.dir(xhr);
                }
            });
        });
    </script>
</body>
</html>
