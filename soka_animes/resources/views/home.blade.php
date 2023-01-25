<x-app title="Home">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-post-form :works="$works" :characters="$characters"></x-post-form>

            <div class="mt-5">
                @foreach($posts as $post)
                    <x-post :username="$username = Auth::user()->name" :post="$post" :works="$post->works"
                            :characters="$post->characters"></x-post>
                @endforeach
            </div>
        </div>
    </div>
</div>
</x-app>
