<div class="border-bottom border-secondary px-3 pt-3 text-light">
        <div class="row">
            <div class="col-1">
                <div class="image-post bg-secondary rounded-circle d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
            <div class="col-10">
                <span class="fw-bold"> {{$username}} </span>- {{$post->created_at}}
                <a href="" class="text-decoration-none text-light"><p class="mb-2">{{$post->content}}</p></a>
                <a href="#" class="rounded-circle text-decoration-none text-secondary me-3"><i class="fa-regular fa-comment me-1"></i>1200</a>
                <a href="#" class="rounded-circle text-decoration-none text-secondary"><i class="fa-regular fa-heart me-1"></i>15000</a>
            </div>
            <div class="col-1">
                <a href="" class="text-decoration-none text-light"><i class="fa-solid fa-ellipsis"></i></a>
            </div>
        </div>
</div>

