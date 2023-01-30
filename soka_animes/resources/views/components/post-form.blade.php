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
                        <input class="form-control" placeholder="Pesquise por obras..." type="search" name="searchWorks" data-search-work>
                    </div>
                    <div class="modal-body" data-works-container>
                        <div class="d-none" data-works-template>
                            <input type="checkbox" class="btn-check" name="" id="" autocomplete="off" value="">
                            <label class="btn btn-outline-primary mx-1" for=""></label>
                        </div>
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
                            name="searchCharacters" data-search-characters>
                    </div>
                    <div class="modal-body" data-characters-container>

                    </div>
                </div>
            </div>
        </div>
        <div class="p-2" id="checkedContainer">

        </div>

    </form>
</div>
<script type="text/javascript" defer>
    const works = {!! json_encode($works->toArray(), JSON_HEX_TAG) !!};
    const characters = {!! json_encode($characters->toArray(), JSON_HEX_TAG) !!};

    const templateList = document.querySelector("[data-works-template]");

    const containerWorks = document.querySelector("[data-works-container]")
    const searchWork = document.querySelector("[data-search-work]");
    let listedWorks = [];

    const containerCharacters = document.querySelector("[data-characters-container]");
    const searchCharacter = document.querySelector("[data-search-characters]");
    let listedCharacters = [];

    let selectedTags = [];

    searchWork.addEventListener('input', e =>{
        const value = e.target.value.toLowerCase();
        listedWorks.forEach(work =>{
           const isWorkVisible = work.name.toLowerCase().includes(value);
           work.label.classList.toggle("d-none", !isWorkVisible);
           work.input.classList.toggle("d-none", !isWorkVisible);
        });
    });

    searchCharacter.addEventListener('input', e =>{
       const value = e.target.value.toLowerCase();
        listedCharacters.forEach(character =>{
            const isCharacterVisible = character.name.toLowerCase().includes(value);
            character.label.classList.toggle("d-none", !isCharacterVisible);
            character.input.classList.toggle("d-none", !isCharacterVisible);
        });
    });

    listedWorks = works.map(work =>{
        const inputWork = templateList.children[0].cloneNode()
        const labelWork = templateList.children[1].cloneNode()
        inputWork.id = work.name;
        inputWork.value = work.id;
        inputWork.name = "work[]";
        labelWork.textContent = work.name;
        labelWork.htmlFor = work.name;
        containerWorks.append(inputWork);
        containerWorks.append(labelWork);
        return {
            name: work.name, label: labelWork, input: inputWork
        }
    });
    listedCharacters = characters.map(character =>{
        const inputCharacter = templateList.children[0].cloneNode()
        const labelCharacter = templateList.children[1].cloneNode()
        inputCharacter.id = character.name;
        inputCharacter.value = character.id;
        inputCharacter.name = "character[]";
        labelCharacter.textContent = character.name;
        labelCharacter.htmlFor = character.name;
        containerCharacters.append(inputCharacter);
        containerCharacters.append(labelCharacter);
        return {
            name: character.name, label: labelCharacter, input: inputCharacter
        }
    });

    const checkboxes = document.querySelectorAll("input[type=checkbox]");
    const checkedContainer = document.getElementById('checkedContainer');

    checkboxes.forEach(checkbox =>{
        checkbox.addEventListener('click', e =>{
            if(checkbox.checked == true){
                selectedTags.push(`<span class="badge rounded-pill bg-secondary">${checkbox.id}</span>`);
                checkedContainer.innerHTML = selectedTags.join(' ');
            }else{
                let index = selectedTags.indexOf(`<span class="badge rounded-pill bg-secondary">${checkbox.id}</span>`);
                if(index > -1){
                    selectedTags.splice(index, 1);
                    checkedContainer.innerHTML = selectedTags.join(' ');
                }
            }
        });
    });
</script>
