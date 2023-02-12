<x-app title="HOME">
    @foreach($posts as $post)
        <x-post :user="$post->user" :post="$post" :works="$post->works" :characters="$post->characters" :comments="$post->comments"></x-post>
    @endforeach
</x-app>
