<div class="bg-dark text-light">
    <form action="{{route('post.store')}}" method="POST">
        <div class="card-header mt-3">
            <h5>{{Auth::user()->name}}</h5>   
        </div>
        <div class="card-body">
            @csrf
            <textarea class="form-control scroll" type="text" name="content" id="content" maxlength="500"></textarea> 
            <input class="d-none" value="{{Auth::user()->id}}" name="user_id" id="user_id">
            <div class="row d-flex">
                <div class="col-6">
                    <button type="button" class="btn btn-primary dropdown-toggle m-3 rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#modalWorks">
                        Obras
                    </button>
                    <button type="button" class="btn btn-primary dropdown-toggle rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#modalCharacters">
                        Personagens
                    </button>
                </div>
                <div class="col-6 my-auto text-end">
                    <button type="submit" class="btn btn-primary rounded-pill">Postar</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalWorks" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <input class="form-control" placeholder="Pesquise por obras..." type="search" name="searchWorks"
                            id="searchWorks">
                    </div>
                    <div class="modal-body">
                        <div id="worksContainer"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalCharacters" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <input class="form-control" placeholder="Pesquise por personagens..." type="search"
                            name="searchCharacters" id="searchCharacters">
                    </div>
                    <div class="modal-body">
                        <div id="charactersContainer"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-2" id="checkedContainer"></div>

    </form>
</div>
<script type="text/javascript">
    var works = {!!json_encode($works->toArray(), JSON_HEX_TAG) !!};
    works.name = 'work';
    works.checked = '';
    var characters = {!!json_encode($characters->toArray(), JSON_HEX_TAG) !!}
    characters.name = 'character';
    var checkedList = [];

    const worksContainer = document.getElementById('worksContainer');
    const searchBarWorks = document.getElementById('searchWorks');
    const charactersContainer = document.getElementById('charactersContainer');
    const searchBarCharacters = document.getElementById('searchCharacters');
    const checkedContainer = document.getElementById('checkedContainer');


    const getVariableName = varObj => Object.keys(varObj)[0];

    function renderItems(list, container) {
        let formatedList = '';
        if (list.lenght <= 0) {
            formatedList += `<div class="bg-danger">Nenhuma obra disponivel</div>`
        } else {
            list.forEach(listItem => {
                getCheckeds(listItem)
                formatedList +=
                    `<input type="checkbox" class="btn-check" name="${list.name}[]" id="${listItem.name}" autocomplete="off" value="${listItem.id}" ${listItem.checked}>
                <label class="btn btn-outline-primary mx-1" for="${listItem.name}">${listItem.name}</label>`
            });
        }
        console.log(formatedList);
        container.innerHTML = formatedList;
    }

    renderItems(works, worksContainer)
    renderItems(characters, charactersContainer)

    searchBarWorks.addEventListener('keyup', (e) => {
        const searchString = e.target.value.toLowerCase();
        const filteredWorks = works.filter(work => {
            return work.name.toLowerCase().includes(searchString);
        });

        renderItems(works, worksContainer);
    })

    searchBarCharacters.addEventListener('keyup', (e) => {
        const searchString = e.target.value.toLowerCase();
        const filteredCharacters = characters.filter(character => {
            return character.name.toLowerCase().includes(searchString);
        });

        renderItems(characters, charactersContainer);
    })

    var checkboxes = document.querySelectorAll('input[type=checkbox]');
    
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', (e)=>{
                if(checkbox.checked == true){
                    checkedList.push(checkbox.id)
                    console.log(checkedList)
                }else{
                    let index = checkedList.indexOf(checkbox.id)
                    if(index > -1){    
                        checkedList.splice(index);
                    }
                }
            });
    });

</script>
