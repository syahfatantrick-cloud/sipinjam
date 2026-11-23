<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlatRequest;
use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(['cari' => 'nullable|string|max:50']);
        $cari = trim((string) $request->input('cari'));

        $alat = Alat::when($cari !== '', function ($query) use ($cari) {
                    $query->where('nama', 'like', '%' . $cari . '%');
                })
                ->orderBy('kode')
                ->paginate(10)
                ->withQueryString();

        return view('alat.index', compact('alat'));
    }

    public function create()
    {
        return view('alat.create');
    }

    public function store(StoreAlatRequest $request)
    {
        Alat::create($request->validated());
        return redirect()->route('alat.index')->with('sukses', 'Alat berhasil ditambahkan.');
    }

    public function show(Alat $alat)
    {
        return view('alat.show', compact('alat'));
    }

    public function edit(Alat $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    public function update(StoreAlatRequest $request, Alat $alat)
    {
        $alat->update($request->validated());
        return redirect()->route('alat.index')->with('sukses', 'Alat berhasil diperbarui.');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('alat.index')->with('sukses', 'Alat berhasil dihapus.');
    }
}