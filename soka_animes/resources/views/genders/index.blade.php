<x-app title="Gerenciar Gêneros">
    <div class="bg-dark pt-3 px-3 position-sticky sticky-top">
        <h4><b>GÊNEROS:</b></h4>
        <hr class="text-primary">
    </div>
    <div class="p-3">
        <div class="input-dark rounded">
            <div id="addWorkGenders" class="p-2" style="overflow: auto; height: 1000px">
                @foreach ($genders as $gender)
                    <div class="d-flex w-100 badge bg-white-50 text-white align-items-center justify-content-between border border-primary p-3 my-3">
                        <p class="fs-6" style="padding: 0; margin: 0">{{$gender->gender}} </p>
                        <div>
                            <button type="button" class="btn btn-outline-danger fw-bold text-white" data-bs-toggle="modal" data-bs-target="#deleteModal{{$gender->id}}">Excluir</button>
                        </div>
                    </div>
                    <div class="modal fade" id="modalDelete{{$gender->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content bg-dark text-light d-block rounded-3">
                                <div class="modal-body">
                                    <h5 class="fw-bold">Excluir publicação?</h5>
                                    <p class="text-white-50">Essa ação não poderá ser desfeita, o gênero sera excluido e todas as obras a quem pertence não o possuirão mais </p>
                                    <form action="{{route('genders.destroy', $gender->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger form-control rounded-pill">Excluir</button>
                                    </form>
                                    <button type="button" class="btn btn-dark form-control rounded-pill border border-secondary mt-3" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app>
