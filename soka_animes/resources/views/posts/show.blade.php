<x-app title="">
    <div class="row justify-content-center">
        <div class="col-md-6 border-1 border-dark ">
            <h1>{{$post->user->name}}</h1>
            <p class="">{{$post->content}}</p>
            <div class="bg-secondary">
                
            </div>
            @foreach($postComments as $postComment)
                <div class="card mt-3 p-4">
                    <div class="card_body">
                            {{$postComment->user->name}}<br>
                            {{$postComment->content}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app>
