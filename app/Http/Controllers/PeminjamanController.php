<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('alat')->latest()->paginate(10);
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $alats = Alat::where('stok', '>', 0)->orderBy('nama')->get();
        return view('peminjaman.create', compact('alats'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'alat_id'        => 'required|exists:alats,id',
            'nama_peminjam'  => 'required|string|max:100',
            'tanggal_pinjam' => 'required|date',
            'jumlah'         => 'required|integer|min:1',
        ], [
            'alat_id.required'        => 'Alat wajib dipilih.',
            'nama_peminjam.required'  => 'Nama peminjam wajib diisi.',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'jumlah.required'         => 'Jumlah wajib diisi.',
            'jumlah.min'              => 'Jumlah minimal 1.',
        ]);

        Peminjaman::create($data);

        return redirect()->route('peminjaman.index')
            ->with('sukses', 'Data peminjaman berhasil ditambahkan.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')
            ->with('sukses', 'Data peminjaman berhasil dihapus.');
    }
}