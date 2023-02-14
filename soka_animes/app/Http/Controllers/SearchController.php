<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Work;
use App\Models\Post;
use App\Models\User;
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
                $response .= '<a href="#" class="d-flex flex-row p-3 border-bottom border-secondary text-decoration-none text-light">
                                        <img src="'.$work->image.'" alt="'.$work->name.'" width="60" height="80" class="rounded-3 mr-3">
                                        <div class="w-100 ms-2">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="d-block">
                                                    <span class="fs-5 mr-2"><b>'.$work->name.'</b></span>
                                                    <small class="mx-2">'.($work->type === 0 ? "(anime)" : "(manga)").'</small>
                                                </div>
                                            </div>
                                        </div>
                                        </a>';
            }
        }

        $characters = Character::where('name', 'LIKE', '%'.$request->search.'%')->get();
        if ($characters->count() > 0) {
            foreach ($characters as $character) {
                $response .= '  <a href="'.route('characters.show', $character->id).'" class="d-flex flex-row p-3 border-bottom border-secondary text-decoration-none text-light">
                            <img src="'.$character->image.'" alt="'.$character->name.'" width="60" height="80" class="rounded-3 mr-3">
                            <div class="w-100 ms-2">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="d-block">
                                        <span class="fs-5 mr-2"><b>'.$character->name.'</b></span>
                                        <small class="mx-2" >(personagem)</small>
                                    </div>
                                </div>
                            </div>
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

    public function index(){
        $works = Work::all();
        $characters = Character::all();
        $posts = [];
        $users = [];

        return view('search', compact('works', 'characters', 'posts', 'users'));
    }

    public function expand($search){
        if($search){
            $works = Work::where('name', 'LIKE', "%$search%")
                        ->orWhereHas('genders', function($q) use ($search){
                            $q->where('gender', 'LIKE', "%$search%");
                        })
                        ->orWhereHas('characters', function($q) use ($search){
                            $q->where('name', 'LIKE', "%$search%");
                        })->get();
                $characters = Character::where('name', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%")
                            ->orWhereHas('works', function($q) use ($search){
                                $q->where('name', 'LIKE', "%$search%");
                            })->get();
                $users = User::where('name', 'LIKE', "%$search%")->withCount('followers')->orderBy('followers_count', 'desc')->get();
                $posts = Post::with('user')->where('content', 'LIKE', "%$search%")
                        ->orWhereHas('user', function($q) use ($search){
                            $q->where('name', 'LIKE', "%$search%");
                        })
                        ->orWhereHas('characters', function($q) use ($search){
                            $q->where('name', 'LIKE', "%$search%");
                        })
                        ->orWhereHas('works', function($q) use ($search){
                            $q->where('name', 'LIKE', "%$search%");
                        })
                        ->orderBy('created_at', 'desc')->get();

                return view('search', compact('works', 'characters', 'posts', 'users', 'search'));
        }else{
            return back();
        }
    }
}
