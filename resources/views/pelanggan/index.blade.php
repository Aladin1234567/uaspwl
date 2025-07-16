@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('head')
<style>
    body { background: rgb(230,240,255) !important; }
</style>
@endsection

@section('content')
<div class="container">
    <h2 class="mb-4" style="color:#3b82f6;font-weight:bold;">Daftar Pelanggan</h2>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">+ Tambah Pelanggan</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle" style="background:#e0f2fe;color:#1e293b;border-radius:12px;overflow:hidden;">
            <thead style="background:#3b82f6;color:#fff;">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggans as $i => $pelanggan)
                <tr style="background:{{ $i%3==0 ? '#dbeafe' : ($i%3==1 ? '#e0e7ff' : '#bae6fd') }};">
                    <td><span class="badge" style="background:#3b82f6;color:#fff;">#{{ $pelanggan->id }}</span></td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td><span class="badge" style="background:#60a5fa;color:#fff;">{{ $pelanggan->telepon }}</span></td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>
                        <a href="{{ route('pelanggan.show', $pelanggan) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('pelanggan.edit', $pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $pelanggan) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pelanggan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="/dashboard" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
@endsection 