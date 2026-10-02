<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim'     => 'required|unique:mahasiswas,nim',
            'nama'    => 'required',
            'jurusan' => 'required',
            'email'   => 'nullable|email',
        ]);

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $data = $request->validate([
            'nim'     => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama'    => 'required',
            'jurusan' => 'required',
            'email'   => 'nullable|email',
        ]);

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }
}