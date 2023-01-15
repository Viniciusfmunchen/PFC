<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(){
        $works = Work::all();
        return view('works.index', compact('works'));
    }

    public function create(){
        return view('works.create');
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
        ]);

        Work::create($request->post());
        return redirect()->route('works.index')->with('success', 'Obra adicionada com sucesso');
    }

    public function edit(Work $work){
        return view('works.edit', compact('work'));
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
        ]);

        $work->fill($request->post())->save();

        return redirect()->route('works.index')->with('sucesso', 'Obra editado com sucesso');
    }

    public function destroy(Work $work){
        $work->delete();
        return redirect()->route('work.index')->with('sucesso', 'Obra excluido com sucesso');
    }
}
