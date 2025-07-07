<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()  { 
        return view('eventos.index', ['eventos' => Evento::all()]); 
    }
    public function create() {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        return view('eventos.create'); 
    }
    public function store(Request $request)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        Evento::create($request->all());
        return redirect()->route('eventos.index');
    }
    public function edit(Evento $evento)  {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        } 
        return view('eventos.edit', compact('evento')); 
    }
    public function update(Request $r, Evento $evento)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        $evento->update($r->all());
        return redirect()->route('eventos.index');
    }
    public function destroy(Evento $evento)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        $evento->delete();
        return redirect()->route('eventos.index');
    }
}
