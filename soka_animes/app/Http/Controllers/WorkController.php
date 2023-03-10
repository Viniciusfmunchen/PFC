<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Gender;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(){
        $works = Work::all();
        return view('works.index', compact('works'));
    }

    public function show(int $findWorks){
        $work = Work::with('characters')->find($findWorks);

        return view('works.show', compact('work'));
    }

    public function create(){
        if(auth()->user()->isAdmin()){
            $genders = Gender::all();
            $characters = Character::all();
            return view('works.create', compact('genders', 'characters'));
        }
        else{
            return redirect()->back();
        }
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required| min:3 | max:100',
            'release_date' => 'required',
            'chapters' => 'required | integer | min:1',
            'volumes' => 'required | integer | min:1',
            'synopsis' => 'required',
            'status' => 'required',
            'author' => 'required | min:3 | max:50',
            'type' => 'required',
            'gender' =>'required'
        ]);

        $work = Work::create($request->post());
        $genders = $request->gender;
        $characters = $request->character;

        if (isset($genders))
        {
            foreach ($genders as $gender) {
                $work->genders()->attach($gender);
            }
        }
        if (isset($characters))
        {
            foreach ($characters as $character) {
                $work->characters()->attach($character);
            }
        }

        return redirect()->route('works.index')->with('success', 'Obra adicionada com sucesso');
    }

    public function edit(Work $work){
        if(auth()->user()->isAdmin()){
            $genders = Gender::all();
            $characters = Character::all();
            return view('works.edit', compact('genders', 'characters', 'work'));
        }
        else{
            return redirect()->back();
        }
    }

    public function update(Request $request, Work $work){
        $request->validate([
            'name' => 'required| min:3 | max:100',
            'release_date' => 'required',
            'chapters' => 'required | integer | min:1',
            'volumes' => 'required | integer | min:1',
            'synopsis' => 'required',
            'status' => 'required',
            'author' => 'required | min:3 | max:50',
            'type' => 'required',
            'gender' =>'required'
        ]);

        $work->fill($request->post())->save();

        $work->genders()->detach();
        $genders = $request->gender;

        $work->characters()->detach();
        $characters = $request->character;

        foreach ($genders as $gender) {
            $work->genders()->attach($gender);
        }
        if(isset($characters)){
            foreach ($characters as $character) {
                $work->characters()->attach($character);
            }
        }
        return redirect()->route('works.show', $work->id)->with('success', 'Obra editada com sucesso');
    }

    public function destroy(Work $work){
        $work->genders()->detach();
        $work->characters()->detach();
        $work->posts()->detach();
        $work->delete();
        return redirect()->route('search.index')->with('success', 'Obra exclu??da com sucesso');
    }
}
