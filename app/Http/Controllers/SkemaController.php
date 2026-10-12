<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skemas = Skema::latest()->get();
        return view('skema.index', compact('skemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skema.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema',
            'nama_skema' => 'required',
            'deskripsi'  => 'nullable',
        ]);

        Skema::create($request->all());

        return redirect()->route('skema.index')->with('success', 'Data Skema berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skema $skema)
{
    $request->validate([
        'kode_skema' => 'required|unique:skemas,kode_skema,' . $skema->id,
        'nama_skema' => 'required',
        'deskripsi'  => 'nullable',
    ]);

    $skema->update($request->all());
    return redirect()->route('skema.index')->with('success', 'Data Skema berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skema $skema)
    {
        $skema->delete();
        return redirect()->route('skema.index')->with('success', 'Data Skema berhasil dihapus.');
    }
}
