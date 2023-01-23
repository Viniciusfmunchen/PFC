<x-app title="{{$character->name}}">
    <div class="container text-light">
        <div class="row d-flex">
            <div class="col-4">
                <h1>{{$character->name}}</h1>
                <img class="img-fluid" alt="{{$character->name}}" src="{{$character->image}}">
            </div>
            <div class="col-8 mt-5">
                <div>
                    {{$character->description}}
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h2>Aparece em:</h2>
            @foreach($character->works as $characterWork)
                <a href="#" id="workImg"><img class="rounded-circle" src="{{$characterWork->image}}"></a>
            @endforeach
        </div>
    </div>
</x-app>
