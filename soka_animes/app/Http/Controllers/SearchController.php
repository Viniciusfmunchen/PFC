<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Work;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(){
        $this->middleware('web');
    }

    public function search(Request $request)
    {
        if (!$request->ajax()) {
            return;
        }

        $response = '';
        if (!$request->search) {
            return;
        }

        $works = Work::where('name', 'LIKE', '%'.$request->search.'%')
                    ->orWhereHas('characters', function ($q) use ($request) {
                        $q->where('name', 'like', "%$request->search%");
                    })
                    ->orWhereHas('genders', function ($q) use ($request) {
                        $q->where('gender', 'like', "%$request->search%");
                    })
                    ->get();

        if ($works->count() > 0) {
            foreach ($works as $work) {
                $response .= '<li class="nav-item p-3 border-bottom border-info">
                    <div class="row">
                        <div class="col-2" style="height: 100%">
                            <img class="img-fluid rounded-1" src="'.$work->image.'" alt="'. $work->name.'">
                        </div>
                        <div class="col-10 d-flex align-items-center">
                            <span class="fw-bold">'.$work->name.'</span>
                        </div>
                    </div>
                </li>';
            }
        }

        $characters = Character::where('name', 'LIKE', '%'.$request->search.'%')->get();
        if ($characters->count() > 0) {
            foreach ($characters as $character) {
                $response .= '<a class="text-decoration-none text-light" href="'.route('characters.show', $character->id).'">
                    <li class="nav-item p-3 border-bottom border-info">
                        <div class="row">
                            <div class="col-2">
                                <img class="img-fluid rounded-1" src="'.$character->image.'" alt="'.$character->name.'">
                            </div>
                            <div class="col-10 d-flex align-items-center">
                                <span class="fw-bold">'.$character->name.'</span>
                            </div>
                        </div>
                    </li>
                </a>';
            }
        }

        return $response;
    }

    public function searchTags(Request $request){
        if (!$request->ajax()) {
            return;
        }

        $response = '';

        $works = Work::where('name', 'LIKE', '%'.$request->search.'%')
            ->orWhereHas('characters', function ($q) use ($request) {
                $q->where('name', 'like', "%$request->search%");
            })->get();
        if ($works->count() > 0) {
            foreach ($works as $work) {
                $response .= '<input type="checkbox" class="btn-check btn-tag" name="work[]" id="work'.$work['id'].'" autocomplete="off" value="'.$work['id'].'">
                              <label class="btn btn-outline-success" for="work'.$work['id'].'">'.$work['name'].'</label>';

            }
        }

        $characters = Character::where('name', 'LIKE', '%'.$request->search.'%')->get();
        if ($characters->count() > 0) {
            foreach ($characters as $character) {
                $response .= '<input type="checkbox" class="btn-check btn-tag" name="character[]" id="character'.$character['id'].'" autocomplete="off" value="'.$character['id'].'">
                              <label class="btn btn-outline-warning" for="character'.$character['id'].'">'.$character['name'].'</label>';
            }
        }
        return $response;
    }
}
