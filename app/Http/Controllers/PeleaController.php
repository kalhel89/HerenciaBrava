<?php

namespace App\Http\Controllers;

use App\Models\Pelea;
use App\Models\Evento;
use App\Models\Toro;
use Illuminate\Http\Request;

class PeleaController extends Controller
{
    public function index()
    {
        return view('peleas.index',
            ['peleas' => Pelea::with(['evento','toro1','toro2','ganador'])->get()]);
    }

    public function create()
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        return view('peleas.create', [
            'eventos' => Evento::all(),
            'toros'   => Toro::all()
        ]);
    }

    public function store(Request $request)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        Pelea::create($request->all());
        return redirect()->route('peleas.index');
    }

    public function edit(Pelea $pelea)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        return view('peleas.edit', [
            'pelea'   => $pelea,
            'eventos' => Evento::all(),
            'toros'   => Toro::all()
        ]);
    }

    public function update(Request $r, Pelea $pelea)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        $pelea->update($r->all());
        return redirect()->route('peleas.index');
    }

    public function destroy(Pelea $pelea)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        $pelea->delete();
        return redirect()->route('peleas.index');
    }
}
