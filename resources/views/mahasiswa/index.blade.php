@extends('mahasiswa.layout')

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-bg-primary">
            <div class="card-body">
                <div class="small">Total Mahasiswa</div>
                <div class="fs-2 fw-bold">{{ $total }}</div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Daftar Mahasiswa</h4>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

<form method="GET" action="{{ route('mahasiswa.index') }}" class="input-group mb-3">
    <input type="text" name="cari" value="{{ $cari }}" class="form-control"
           placeholder="Cari nama, NIM, atau jurusan...">
    <button class="btn btn-outline-primary">Cari</button>
    @if ($cari)
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary">Reset</a>
    @endif
</form>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-light">
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
                    <td>{{ $mahasiswas->firstItem() + $loop->index }}</td>
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
                <tr><td colspan="6" class="text-center py-4">Data tidak ditemukan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $mahasiswas->links() }}
</div>
@endsection