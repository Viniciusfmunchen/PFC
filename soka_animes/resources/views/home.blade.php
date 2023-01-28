<x-app title="Home">
    <div class="row justify-content-center">
        <x-post-form :works="$works" :characters="$characters"></x-post-form>
        <div class="mt-5">
            @foreach($posts as $post)
                <x-post :username="Auth::user()->name" :post="$post" :works="$post->works" :characters="$post->characters" :comments="$post->comments"></x-post>
            @endforeach
        </div>
    </div>
</x-app>
