<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::all();
        return view('characters.index', compact('characters'));
    }

    public function create()
    {
        return view('characters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required | min:50 | max:1000',
            'image' => 'required'
        ]);

        Character::create($request->post());
        return redirect()->route('characters.index')->with('success', 'Personagem adicionado com sucesso');
    }

    public function edit(Character $character){
        return view('characters.edit', compact('character'));
    }

    public function update(Request $request, Character $character){
        $request->validate([
            'name' => 'required',
            'description' => 'required | min:50 | max:1000',
            'image' => 'required'
        ]);

        $character->fill($request->post())->save();

        return redirect()->route('characters.index')->with('sucesso', 'Personagem editado com sucesso');
    }

    public function destroy(Character $character){
        $character->delete();
        return redirect()->route('characters.index')->with('sucesso', 'Personagem excluido com sucesso');
    }
}
