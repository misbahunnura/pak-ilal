@extends('mahasiswa.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Daftar Mahasiswa</h4>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

<table class="table table-bordered table-striped bg-white">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswas as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->nim }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->jurusan }}</td>
            <td>{{ $m->email }}</td>
            <td>
                <a href="{{ route('mahasiswa.edit', $m) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('mahasiswa.destroy', $m) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">Belum ada data</td></tr>
        @endforelse
    </tbody>
</table>
@endsection