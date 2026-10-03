<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        $mahasiswas = Mahasiswa::query()
            ->when($cari, function ($query) use ($cari) {
                $query->where('nama', 'like', "%{$cari}%")
                      ->orWhere('nim', 'like', "%{$cari}%")
                      ->orWhere('jurusan', 'like', "%{$cari}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $total = Mahasiswa::count();

        return view('mahasiswa.index', compact('mahasiswas', 'cari', 'total'));
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