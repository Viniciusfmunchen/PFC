<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Gender;
use App\Models\Post;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        if (!$request->ajax()) {
            return;
        }

        $response = '';
        if($request->search){
            $data = [
                'search' => $request->search,
                'works' => Work::where('name', 'LIKE', '%'.$request->search.'%')
                                ->orWhereHas('characters', function ($q) use ($request){
                                    $q->where('name', 'like', "%$request->search%");
                                })
                                ->orWhereHas('genders', function ($q) use ($request){
                                    $q->where('gender', 'like', "%$request->search%");
                                })
                                ->get(),
                'characters' => Character::where('name', 'LIKE', '%'.$request->search.'%')->get(),
            ];
        }else{
            return;
        }
        $response .= '<li class="nav-item p-3 border-bottom border-info">
                        <div class="row">
                            <div class="col-2">
                                <div class="image-post bg-info rounded-circle d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-search"></i>
                                </div>
                            </div>
                            <div class="col-10 d-flex align-items-center gx-5">
                                <span class="fw-bold">'.$data['search'].'</span>
                            </div>
                        </div>
                    </li>';
        if(count($data['works']) > 0){
            foreach ($data['works'] as $work){
                $response .= '<li class="nav-item p-3 border-bottom border-info">
                        <div class="row">
                            <div class="col-2" style="height: 100%">
                                <img class="img-fluid rounded-1" src="'.$work['image'].'" alt="'. $work['name'].'">
                            </div>
                            <div class="col-10 d-flex align-items-center">
                                <span class="fw-bold">'.$work['name'].'</span>
                            </div>
                        </div>
                    </li>';
            }
        }
        if(count($data['characters']) > 0){
            foreach ($data['characters'] as $character){
                $response .= '<a class="text-decoration-none text-light" href="'.route('characters.show', $character['id']).'">
                                <li class="nav-item p-3 border-bottom border-info">
                                    <div class="row">
                                        <div class="col-2">
                                           <img class="img-fluid rounded-1" src="'.$character['image'].'" alt="'.$character['name'].'">
                                        </div>
                                        <div class="col-10 d-flex align-items-center">
                                            <span class="fw-bold">'.$character['name'].'</span>
                                        </div>
                                    </div>
                                </li>
                            </a>';
            }
        }

        return $response;
    }
}
