@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container">
    <h2>Tambah Transaksi</h2>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->nama }}</option>
                @endforeach
            </select>
            @error('pelanggan_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>{{ $barang->nama }}</option>
                @endforeach
            </select>
            @error('barang_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="waktu_sewa_mulai" class="form-label">Waktu Sewa Mulai</label>
            <input type="datetime-local" name="waktu_sewa_mulai" id="waktu_sewa_mulai" class="form-control" required value="{{ old('waktu_sewa_mulai') }}">
            @error('waktu_sewa_mulai')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="waktu_sewa_selesai" class="form-label">Waktu Sewa Selesai</label>
            <input type="datetime-local" name="waktu_sewa_selesai" id="waktu_sewa_selesai" class="form-control" required value="{{ old('waktu_sewa_selesai') }}">
            @error('waktu_sewa_selesai')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="batal" {{ old('status') == 'batal' ? 'selected' : '' }}>Batal</option>
            </select>
            @error('status')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 