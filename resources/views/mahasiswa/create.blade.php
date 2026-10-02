@extends('mahasiswa.layout')

@section('content')
<h4>Tambah Mahasiswa</h4>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswa.store') }}" method="POST" class="card card-body">
    @csrf
    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" value="{{ old('nim') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Email (opsional)</label>
        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
    </div>
    <div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection