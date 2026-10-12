<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                return $query->where('nama_peserta', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('peserta.index', compact('pesertas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skema_id'     => 'required|exists:skemas,id',
            'nama_peserta' => 'required|string|max:255',
            'nik'          => 'required|numeric|digits:16|unique:pesertas,nik',
            'email'        => 'required|email',
            'no_hp'        => 'required|numeric|digits:13',
            'alamat'       => 'required',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data Peserta berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peserta = Peserta::with('skema')->findOrFail($id);

        return view('peserta.show', compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $skemas = Skema::all();

        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'skema_id'     => 'required|exists:skemas,id',
            'nama_peserta' => 'required|string|max:255',
            'nik'          => 'required|numeric|digits:16|unique:pesertas,nik,' . $peserta->id,
            'email'        => 'required|email',
            'no_hp'        => 'required|numeric|digits:13',
            'alamat'       => 'required',
        ]);

        $peserta->update($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data Peserta berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus.');
    }
}
