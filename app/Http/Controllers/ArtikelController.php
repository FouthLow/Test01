<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('artikel.index', ['artikels' => Artikel::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtikelRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('artikel', 'public');
        }

        Artikel::create($data);
        return to_route('artikels.index')->with('berhasil', 'artikel berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {   
        $data = $request->validated();

        if($request->hasFile('image')){

            if($artikel->image){
                Storage::disk('public')->delete($artikel->image);
            }
            $data['image'] = $request->file('image')->store('artikel', 'public');
        }

        $artikel->update($data);
        return to_route('artikels.index')->with('berhasil', 'artikel berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return to_route('artikels.index')->with('berhasil', 'atikel berhasil dihapus.');
    }
}
