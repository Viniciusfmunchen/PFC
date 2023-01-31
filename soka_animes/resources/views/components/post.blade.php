<div class="border-bottom border-secondary px-3 pt-3 text-light">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-1">
                <div class="image-post bg-secondary rounded-circle d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
            <div class="col-11">
                <span class="fw-bold mx-2"> {{$username}} </span>- {{$post->created_at}}<br>
            </div>
        </div>
        <div class="mx-5 px-3 ">
            <p>{{$post->content}}</p>
        </div>
        <div class="row d-flex justify-content-center mt-2 mx-5 p-2">
            <div class="col-3">
                <a href="#" class="fa-regular fa-comment text-decoration-none text-light"></a>
                <a href="#" class="fa-regular fa-heart text-decoration-none text-light mx-2"></a>
            </div>
            <div class="col-9 text-end">
                @foreach ($characters as $character)
                    <a href="#">
                        <span class="badge badge-pill bg-warning">{{$character->name}}</span>
                    </a>
                @endforeach
                @foreach($works as $work)
                    <a href="#">
                        <span class="badge badge-pill bg-info mx-1">{{$work->name}}</span>
                    </a>
                @endforeach
            </div>
        </div>
    
</div>
