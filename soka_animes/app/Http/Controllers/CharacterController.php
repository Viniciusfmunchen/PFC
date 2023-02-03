<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Work;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::all();
        return view('characters.index', compact('characters'));
    }

    public function show(int $findCharacter){
        $character = Character::with('works')->find($findCharacter);

        return view('characters.show', compact('character'));
    }

    public function create()
    {
        $works = Work::all();
        return view('characters.create', compact('works'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required | min:50 | max:1000',
            'image' => 'required'
        ]);

        $works = $request->work;
        $character = Character::create($request->post());

        if (isset($works)){
            foreach ($works as $work) {
                $character->works()->attach($work);
            }
        }

        return redirect()->route('characters.index')->with('success', 'Personagem adicionado com sucesso');
    }

    public function edit(Character $character){
        $works = Work::all();
        return view('characters.edit', compact('character', 'works'));
    }

    public function update(Request $request, Character $character){
        $request->validate([
            'name' => 'required',
            'description' => 'required | min:50 | max:1000',
            'image' => 'required'
        ]);

        $character->fill($request->post())->save();

        if(!isset($works)){
            $character->works()->detach();
            $works = $request->work;
            foreach ($works as $work) {
                $character->works()->attach($work);
            }
        }
        return redirect()->route('characters.index')->with('success', 'Personagem editado com sucesso');
    }

    public function destroy(Character $character){
        $character->works()->detach();
        $character->posts()->detach();
        $character->delete();
        return redirect()->route('characters.index')->with('success', 'Personagem excluido com sucesso');
    }
}
