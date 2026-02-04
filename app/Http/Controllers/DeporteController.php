<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use App\Http\Requests\Deportes\StoreDeporteRequest;
use App\Http\Requests\Deportes\UpdateDeporteRequest;
use Illuminate\Support\Facades\Auth;

class DeporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deportes = Deporte::all();
        return view('deportes.index', compact('deportes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.deportes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeporteRequest $request)
    {
        Deporte::create($request->validated());

        return redirect()->route('admin.deportes.index');
    }   

    /**
     * Display the specified resource.
     */
    public function show(Deporte $deporte)
    {
        $deporte = Deporte::findOrFail($deporte->id);
        return view('admin.deportes.show', compact('deporte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deporte $deporte)
    {
        return view('admin.deportes.edit', compact('deporte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeporteRequest $request, Deporte $deporte)
    {
        $deporte->update($request->validated());

        return redirect()->route('admin.deportes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deporte $deporte)
    {
        $deporte->delete();

        return redirect()->route('admin.deportes.index');
    }   

    public function indexAdmin()
    {
        $deportes = Deporte::all();
        return view('admin.deportes.index', compact('deportes'));
    }
}
