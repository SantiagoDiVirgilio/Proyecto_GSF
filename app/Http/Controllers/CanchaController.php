<?php

namespace App\Http\Controllers;

use App\Models\Cancha;
use App\Http\Requests\StoreCanchaRequest;
use App\Http\Requests\UpdateCanchaRequest;

class CanchaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canchas = Cancha::all();
        return view('canchas.index', compact('canchas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.canchas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCanchaRequest $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:30',
            'tipo' => 'required|string|max:30',
            'descripcion' => 'required|string|max:100',
            'precio' => ['required', 'numeric'],
        ]);

        Cancha::create($validated);

        return redirect()->route('admin.canchas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancha $cancha)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancha $cancha)
    {
        return view('admin.canchas.edit', compact('cancha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCanchaRequest $request, Cancha $cancha)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:30',
            'tipo' => 'required|string|max:30',
            'descripcion' => 'required|string|max:100',
            'precio' => ['required', 'numeric'],
        ]);

        $cancha->update($validated);

        return redirect()->route('admin.canchas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancha $cancha)
    {
        $cancha->delete();

        return redirect()->route('admin.canchas.index');
    }

    public function indexAdmin()
    {
        $canchas = Cancha::all();
        return view('admin.canchas.index', compact('canchas'));
    }
}
