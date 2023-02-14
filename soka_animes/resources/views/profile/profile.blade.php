<x-app title="Perfil">
        <div class="border border-secondary pb-3 bg-dark">
            <img class="card-img-top" src="{{'/img/profile-covers/' . $user->profile_cover}}">
                <div class="card-body little-profile text-center">
                    <div class="pro-img"><img src="{{'/img/profile-images/' . $user->profile_image}}"></div>
                    <h3 class="m-b-0">{{$user->name}}</h3>
                    @if($user->id == Auth::user()->id)
                        <button type="button" class="btn btn-md btn-rounded btn-outline-light m-t-10 fw-bold" data-bs-toggle="modal" data-bs-target="#editModal">Editar</button>
                    @else
                        <input type="checkbox" class="btn-check" id="follow" autocomplete="off" @if($user->followers()->exists(Auth::user()->id)) checked @endif >
                        <label id="follow" class="btn btn-md btn-rounded btn-outline-light m-t-10 fw-bold following" for="follow">@if($user->followers()->exists(Auth::user()->id)) SEGUINDO @else SEGUIR @endif</label>
                    @endif
                    @if($user->type === '1')
                        <div class="row text-center m-t-20">
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0">{{count($posts)}}</h3><small>Publicações</small>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 ">{{$user->followers()->count()}}</h3><small>Seguidores</small>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0">{{$user->followings()->count()}}</h3><small>Seguindo</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        <div>
        <ul class="nav nav-pills shadow-sm d-flex text-center" id="pills-tab" role="tablist">
            <li class="nav-item col-6">
                <a class="nav-link tabs active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Publicações</a>
            </li>
            <li class="nav-item col-6">
                <a class="nav-link tabs" id="pills-liked-tab" data-bs-toggle="pill" href="#pills-liked" role="tab" aria-controls="pills-liked" aria-selected="true">Curtidas</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- 1st card -->
            <div class="tab-pane fade show active row justify-content-center px-2" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <x-post :user="$user" :post="$post" :works="$post->works" :characters="$post->characters" :comments="$post->comments"></x-post>
                    @endforeach
                        @if($user->id == Auth::user()->id)
                            <div class="d-flex justify-content-center align-items-center p-3 border-bottom border-info text-white-50">
                                Você chegou ao fim do seu perfil. <button type="button" class="btn btn-dark fw-bold text-white" data-bs-toggle="modal" data-bs-target="#postModal">
                                    Faça novas publicações!
                                </button>
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center p-3 border-bottom border-info text-white-50">
                                Você chegou ao fim do perfil de {{$user->name}}
                            </div>
                        @endif
                @else
                    @if($user->id == Auth::user()->id)
                        <div class="d-flex flex-column text-center text-white-50 mt-3">
                            <h3>Você não possui nenhuma publicação.</h3>
                            <h5>Comece agora,<button type="button" class="btn btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#postModal">
                                    TATAKAE !
                                </button></h5>
                        </div>
                    @else
                        <div class="d-flex flex-column text-center text-white-50 mt-3">
                            <h3>{{$user->name}} não possui nenhuma publicação.</h3>
                        </div>
                    @endif
                @endif
            </div>

            <!-- 2nd card -->
            <div class="tab-pane fade text-white" id="pills-liked" role="tabpanel" aria-labelledby="pills-profile-tab">
                Futuro
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark px-3 pt-3">
                <div class="modal-header border-info">
                    <h4><b>Editar Perfil</b></h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="profile_cover">
                                <img style="width: 100%; object-fit: cover" id="label-profile-cover" src="{{'/img/profile-covers/' . $user->profile_cover}}">
                            </label>
                            <input id="profile_cover" name="profile_cover" type="file" class="d-none">
                        </div>
                        <div class="form-group">
                            <label for="profile_image">
                                <div class="little-profile">
                                    <div class="pro-img "><img id="label-profile-image" src="{{'/img/profile-images/' . $user->profile_image}}"></div>
                                </div>
                            </label>
                            <input id="profile_image" name="profile_image" type="file" class="d-none">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nome de usuario:</label>
                            <input type="text" name="name" id="name" class="form-control input-dark" value="{{Auth::user()->name}}">
                        </div>
                        <div class="modal-footer border-info pb-1">
                            <button type="submit" class="btn btn-primary" ><b>
                                    Salvar
                                </b></button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <b>Cancelar</b>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>
<script>
    $('#follow').on('click', function (){
        var label = $('#follow').next();
        $follow = $(this).is(':checked');
        $.ajax({
            type: 'GET',
            url: '{{ route('follow') }}',
            data: {
                'follow': $follow,
                'followed_user': '{{ $user->id }}',
                'follower_id': '{{Auth::user()->id}}'
            },
            success: function(data) {
                label.text(data)
            }
        });
    });

    $('#profile_image').on('change', function () {
        const [file] = this.files;
        if (file) {
            $('#label-profile-image').attr('src', URL.createObjectURL(file));
        }
    });
    $('#profile_cover').on('change', function () {
        const [file] = this.files;
        if (file) {
            $('#label-profile-cover').attr('src', URL.createObjectURL(file));
        }
    });
    $('button[data-bs-dismiss="modal"]').on('click', function() {
        setTimeout(function() {
            $('#name').val('{{Auth::user()->name}}');
            $('#label-profile-cover').attr('src', '{{'/img/profile-covers/' . Auth::user()->profile_cover}}');
            $('#label-profile-image').attr('src', '{{'/img/profile-images/' . Auth::user()->profile_image}}');
        }, 200);
    });

</script>

