@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="container">
    <h2>Edit Pelanggan</h2>
    <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $pelanggan->nama) }}">
            @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required value="{{ old('alamat', $pelanggan->alamat) }}">
            @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control" required value="{{ old('telepon', $pelanggan->telepon) }}">
            @error('telepon')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $pelanggan->email) }}">
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 