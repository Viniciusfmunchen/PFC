<x-app title="Pesquisar">
    <div class="p-3">
        <div class="search-box input-group rounded-pill px-3 py-1 mt-2 w-100">
            <span class="input-group-append d-flex align-items-center">
                <button typeof="submit" class="btn search-box p-2" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
            <input class="input-dark-search form-control" type="text" id="search" name="search"
                autocomplete="off" placeholder="Pesquise por animês, mangás, publicações e usuários">
        </div>
        <div class="position-relative">
            <div id="searched-show" class="collapse rounded-3 mt-2 bg-info position-absolute" style="width: 100%">
                <a id="expand-search" class="text-decoration-none text-light" href="">
                    <div class="border-bottom border-secondary p-3">
                        <span class="rounded-circle d-flex justify-content-start align-items-center"><i class="fa-solid fa-search p-3 bg-secondary rounded-circle me-2"></i><span class="fw-bold" id="searched"></span></span>
                    </div>
                </a>
                <div id="loading" class="progress d-none">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
                <div id="search-results" style="width:100%; max-height: 300px; overflow: auto">

                </div>
            </div>
        </div>
    </div>
    <div>
        <ul class="nav nav-pills shadow-sm d-flex text-center border-top border-secondary" id="pills-tab" role="tablist">
            <li class="nav-item @auth @if(Route::is('search.expand')) col-3 @else col-6 @endif @else col-6 @endauth">
                <a class="nav-link tabs active" id="pills-liked-tab" data-bs-toggle="pill" href="#pills-works" role="tab" aria-controls="pills-liked" aria-selected="true">Obras</a>
            </li>
            <li class="nav-item @auth @if(Route::is('search.expand')) col-3 @else col-6 @endif @else col-6 @endauth ">
                <a class="nav-link tabs" id="pills-liked-tab" data-bs-toggle="pill" href="#pills-characters" role="tab" aria-controls="pills-liked" aria-selected="true">Personagens</a>
            </li>
            @auth
                <li class="nav-item @if(!Route::is('search.expand')) d-none @else col-3 @endif">
                    <a class="nav-link tabs" id="pills-liked-tab" data-bs-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-liked" aria-selected="true">Usuários</a>
                </li>
                <li class="nav-item col-3 @if(!Route::is('search.expand')) d-none @else col-3 @endif ">
                    <a class="nav-link tabs " id="pills-home-tab" data-bs-toggle="pill" href="#pills-posts" role="tab" aria-controls="pills-home" aria-selected="true">Publicações</a>
                </li>
            @endauth
        </ul>
        @if(Route::is('search.expand'))
            <div class="bg-secondary p-3">
                <b><i class="fa-solid fa-search"></i>Pesquisando por:</b> {{$search}}
            </div>
        @endif
        <div class="tab-content" id="pills-tabContent">
            <!-- 1st card -->
            <div class="tab-pane fade show active text-white p-3" id="pills-works" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if($works->count() > 0)
                    <div class="row row-cols-1 row-cols-md-3 g-3 p-3">
                        @foreach ($works as $work)
                                <div class="col card-group">
                                    <div class="card bg-secondary position-static" data-work-type="{{$work->type}}">
                                        <a href="{{route('works.show', $work->id)}}"><img src="{{$work->image}}" class="card-img-top" alt="..." style="max-height: 200px"></a>
                                        <div class="card-body d-flex justify-content-center align-items-center text-center">
                                            <h6 class="text-fluid fw-bold">{{$work->name}}</h6>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <span class="badge text-dark  @if($work->type == 0) bg-anime @else bg-manga @endif"><b>@if($work->type == 0) ANIMÊ @else MANGÁ @endif</b></span>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                    </div>
                @else
                    Nao encontramos nenhuma obra.
                @endif
             </div>
            <!-- 2nd card -->
            <div class="tab-pane fade text-white p-3" id="pills-characters" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if($characters->count() > 0)
                    <div class="row row-cols-3 row-cols-md-3 g-4">
                        @foreach ($characters as $character)
                            <a href="{{route('characters.show', $character)}}" class="text-decoration-none text-light">
                                <div class="col card-group ">
                                    <div class="card bg-secondary position-static">
                                        <img src="{{$character->image}}" class="card-img-top" alt="..." style="max-height: 200px">
                                        <div class="card-body d-flex justify-content-center align-items-center text-center">
                                            <h6 class="card-title fw-bold">{{$character->name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    Nao encontramos nenhum personagem.
                @endif
             </div>
            @if(Route::is('search.expand'))
                @auth
                    <!-- 3nd card -->
                    <div class="tab-pane fade text-white p-3" id="pills-users" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @if($users->count() > 0)
                            @foreach($users as $user)
                                <div class="d-flex flex-row p-3 border-bottom border-info">
                                    <a href="{{route('profile.user', $user->name)}}"><img src="{{'/img/profile-images/' . $user->profile_image}}" width="40" height="40" class="rounded-circle mr-3"></a>
                                    <div class="w-100 ms-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <a class="text-decoration-none text-light" href="{{route('profile.user', $user->name)}}"><span class="mr-2"><b>{{$user->name}}</b></span></a>
                                            </div>
                                        </div>
                                        <a href="{{route('profile.user', $user->id)}}" class="text-decoration-none text-light"><p class="text-justify comment-text mb-0"><span class="me-1">Seguidores : {{$user->followers()->count()}}</span> · <span class="ms-1">Publicações: {{$user->posts()->count()}}</span></p></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            Nao encontramos nenhum usuario
                        @endif

                    </div>
                    <!-- 4nd card -->
                    <div class="tab-pane fade text-white p-3" id="pills-posts" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @if($posts->count() > 0)
                            @foreach($posts as $post)
                                <x-post :user="$post->user" :post="$post" :works="$post->works" :characters="$post->characters" :comments="$post->comments"></x-post>
                            @endforeach
                        @else
                            Nao encontramos nenhuma publicacao.
                        @endif

                     </div>
                @endauth
            @endif
        </div>
    </div>
</x-app>

