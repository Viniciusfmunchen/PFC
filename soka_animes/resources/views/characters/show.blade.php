<x-app title="{{$character->name}}">
    <div class="bg-secondary position-sticky sticky-top p-3">
        <h2 class="fw-bold">{{$character->name}}</h2>
    </div>
    <div class="d-flex flex-row  m-4 gap-3" style="max-height: 250px">
        <div>
            <img class="rounded-5" width="150" height="230" src="{{$character->image}}" alt="">
        </div>
        <div class="bg-secondary rounded-4 p-3" width="100%" height="230" style="overflow:auto">
            {{$character->description}}
        </div>
    </div>
    <div class="border-top border-info">
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-3"><b>APARECE EM:</b></h3>
                    </div>
                    <div class="col-6 text-end">
                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button"
                            data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button"
                            data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                @foreach($character->works as $works)
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <img class="img-fluid" alt="100%x280"
                                                        src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Special title treatment</h4>
                                                        <p class="card-text">With supporting text below as a natural lead-in
                                                            to additional content.</p>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app>
