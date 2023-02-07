<form action="{{route('posts.store')}}" method="POST" class="mb-3">
    @csrf
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark px-3 pt-3">
            <div class="modal-body">
                <div
                    class="image-post bg-secondary rounded-circle d-flex justify-content-center align-items-center mb-3">
                    <i class="fa-solid fa-user"></i>
                </div>
                <textarea class="form-control input-dark rounded-3" name="content" id="content"
                          placeholder="Faça uma nova publicação.."></textarea>
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                <div id="selected-tags" class="mt-1">

                </div>
                <div class="input-group rounded- mt-3" id="input-group-tags">
                    <span class="input-group-append d-flex align-items-center" data-bs-toggle="popover" data-bs-trigger="hover focus">
                        <button id="btn-focus-search-tags" class="btn btn-secondary p-2" type="button" >
                            <i class="fa fa-tags"></i>
                        </button>
                    </span>
                    <input class="input-dark form-control" type="text" id="input-search-tags" name="search-tags"
                           autocomplete="off" placeholder="Pesquise tags para sua publicacao">
                </div>
                <div class="input-dark rounded-3 mt-3">
                    <div class="sticky-top px-2 pt-1 pb-2 rounded-top">
                        <span class="badge bg-anime text-dark fw-bold"><b>ANIMES</b></span>
                        <span class="badge bg-manga text-dark fw-bold"><b>MANGAS</b></span>
                        <span class="badge bg-character text-dark fw-bold"><b>PERSONAGENS</b></span>
                    </div>
                    <div id="searchedTags" class="p-2"  style="overflow: auto; height: 150px">
                        <div id="template-tags" class="d-none">
                            <input type="checkbox" class="btn-check tags" name="" id="" autocomplete="off" value="">
                            <label class="btn btn-outline-primary label-check fw-bold mx-1 mt-2 d-flex align-items-center" for=""></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-secondary">
                <button type="submit" class="btn btn-primary">Publicar</button>
            </div>
        </div>
    </div>
</div>
</form>

