@extends('mahasiswa.layout')

@section('content')
<h4>Edit Mahasiswa</h4>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" class="card card-body">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Email (opsional)</label>
        <input type="text" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}">
    </div>
    <div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection