<x-app title="Pesquisar">
    <div class="p-3">
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
                    <div class="row gap-1">
                        <div class="col-2">
                            <div
                                class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 45px; height: 45px">
                                <i class="fa-solid fa-search"></i>
                            </div>
                        </div>
                        <div class="col-9 d-flex align-items-center gx-5">
                            <span class="fw-bold" id="searched"></span>
                        </div>
                    </div>
                </div></a>
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
            <li class="nav-item col-3">
                <a class="nav-link tabs active" id="pills-liked-tab" data-bs-toggle="pill" href="#pills-works" role="tab" aria-controls="pills-liked" aria-selected="true">Obras</a>
            </li>
            <li class="nav-item col-3">
                <a class="nav-link tabs" id="pills-liked-tab" data-bs-toggle="pill" href="#pills-characters" role="tab" aria-controls="pills-liked" aria-selected="true">Personagens</a>
            </li>
            <li class="nav-item col-3">
                <a class="nav-link tabs" id="pills-liked-tab" data-bs-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-liked" aria-selected="true">Usuários</a>
            </li>
            <li class="nav-item col-3">
                <a class="nav-link tabs " id="pills-home-tab" data-bs-toggle="pill" href="#pills-posts" role="tab" aria-controls="pills-home" aria-selected="true">Publicações</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- 1st card -->
            <div class="tab-pane fade show active text-white p-3" id="pills-works" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if($works)
                    <div class="row row-cols-3 row-cols-md-3 g-4">
                        @foreach ($works as $work)
                            <div class="col card-group">
                                <div class="card bg-secondary position-static">
                                    <img src="{{$work->image}}" class="card-img-top" alt="..." style="max-height: 200px">
                                    <div class="card-body d-flex justify-content-center align-items-center text-center">
                                        <h6 class="card-title fw-bold">{{$work->name}}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    Nao podemos encontrar nenhuma obra em nossos registros.
                @endif
             </div>
            <!-- 2nd card -->
            <div class="tab-pane fade text-white p-3" id="pills-characters" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if($characters)
                    <div class="row row-cols-3 row-cols-md-3 g-4">
                        @foreach ($characters as $character)
                            <div class="col card-group">
                                <div class="card bg-secondary">
                                    <img src="{{$character->image}}" class="card-img-top" alt="..." style="max-height: 200px">
                                    <div class="card-body d-flex justify-content-center align-items-center text-center">
                                        <h6 class="card-title fw-bold">{{$character->name}}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    Nao podemos encontrar nenhuma obra em nossos registros.
                @endif
             </div>
            <!-- 3nd card -->
            <div class="tab-pane fade text-white" id="pills-users" role="tabpanel" aria-labelledby="pills-profile-tab">
                Users
            </div>
            <!-- 4nd card -->
            <div class="tab-pane fade text-white" id="pills-posts" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if($posts)
                @foreach($posts as $post)
                    <x-post :user="$post->user" :post="$post" :works="$post->works" :characters="$post->characters" :comments="$post->comments"></x-post>
                @endforeach
                @else
                    Nao encontramos nenhum post em nossos registros
                @endif
             </div>
        </div>
    </div>
</x-app>
