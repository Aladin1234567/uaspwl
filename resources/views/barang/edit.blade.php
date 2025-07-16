@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="container">
    <h2>Edit Barang</h2>
    <form action="{{ route('barang.update', $barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $barang->nama) }}">
            @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
            @error('deskripsi')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" required min="0" value="{{ old('stok', $barang->stok) }}">
            @error('stok')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="harga_sewa" class="form-label">Harga Sewa</label>
            <input type="number" step="0.01" name="harga_sewa" id="harga_sewa" class="form-control" required min="0" value="{{ old('harga_sewa', $barang->harga_sewa) }}">
            @error('harga_sewa')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 