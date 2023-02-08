<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index(){
        $genders = Gender::all();
        return view('genders.index', compact('genders'));
    }

    public function create(){
        return view('genders.create');
    }

    public function store(Request $request){
        $request->validate([
            'gender' => 'required | min: 3 | max: 20',
        ]);

        Gender::create($request->post());

        return redirect()->route('genders.index')->with('success', 'Genero adicionado com sucesso');
    }

    public function edit(Gender $gender){
        return view('genders.edit', compact('gender'));
    }

    public function update(Request $request, Gender $gender){
        $request->validate([
            'gender' => 'required | min: 3 | max: 20',
        ]);

        $gender->fill($request->post())->save();

        return redirect()->route('genders.index')->with('sucesso', 'Genero editado com sucesso');
    }

    public function destroy(Gender $gender){
        $gender->delete();
        return redirect()->route('genders.index')->with('sucesso', 'Genero excluido com sucesso');
    }

    public function createGenderFromWork(Request $request){
        if(!$request->ajax()){
            return;
        }

        $validated = $request->validate([
            'gender' => 'required | min: 3 | max: 20',
        ]);

        $gender = Gender::create($validated);
        $genderBtn = '<input type="checkbox" class="btn-check" name="gender[]" id="gender'.$gender->id.'" autocomplete="off" value="'.$gender->id.'">
              <label class="btn btn-outline-primary text-light" for="gender'.$gender->id.'"><b>'.$gender->gender.'</b></label>';;

        return $genderBtn;
    }
}
