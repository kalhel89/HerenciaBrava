<?php

namespace App\Http\Controllers;

use App\Models\Toro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToroController extends Controller
{
    
    public function index()
    {
        return view('toros.index', ['toros' => Toro::all()]);
    }

    public function create()
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        return view('toros.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        $validated = $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'peso' => 'required|numeric',
            'categoria' => 'required',
            'victorias' => 'nullable|integer',
            'derrotas' => 'nullable|integer',
            'empates' => 'nullable|integer',
            'propietario_id' => 'required|integer',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $validated['foto'] = basename($path);
        }

        Toro::create($validated);

        return redirect()
            ->route('toros.index')
            ->with('success', 'Toro creado correctamente');
    }

    public function edit(Toro $toro)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        return view('toros.edit', compact('toro'));
    }

    public function update(Request $request, Toro $toro)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        $validated = $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'peso' => 'required|numeric',
            'categoria' => 'required',
            'victorias' => 'nullable|integer',
            'derrotas' => 'nullable|integer',
            'empates' => 'nullable|integer',
            'propietario_id' => 'required|integer',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // Si ya existía una foto previa, la eliminamos
            if ($toro->foto && Storage::exists('public/fotos/' . $toro->foto)) {
                Storage::delete('public/fotos/' . $toro->foto);
            }
            $path = $request->file('foto')->store('fotos', 'public');
            $validated['foto'] = basename($path);
        }

        $toro->update($validated);

        return redirect()
            ->route('toros.index')
            ->with('success', 'Toro actualizado correctamente');
    }

    public function destroy(Toro $toro)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403, 'No autorizado.');
        }
        if ($toro->foto && Storage::exists('public/fotos/' . $toro->foto)) {
            Storage::delete('public/fotos/' . $toro->foto);
        }

        $toro->delete();

        return redirect()
            ->route('toros.index')
            ->with('success', 'Toro eliminado correctamente');
    }
}
