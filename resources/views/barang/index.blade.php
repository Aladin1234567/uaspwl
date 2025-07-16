@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('head')
<style>
    body { background: rgb(230,240,255) !important; }
</style>
@endsection

@section('content')
<div class="container">
    <h2 class="mb-4" style="color:#3b82f6;font-weight:bold;">Daftar Barang</h2>
    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">+ Tambah Barang</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle" style="background:#e0f2fe;color:#1e293b;border-radius:12px;overflow:hidden;">
            <thead style="background:#3b82f6;color:#fff;">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga Sewa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $i => $barang)
                <tr style="background:{{ $i%3==0 ? '#dbeafe' : ($i%3==1 ? '#e0e7ff' : '#bae6fd') }};">
                    <td><span class="badge" style="background:#3b82f6;color:#fff;">#{{ $barang->id }}</span></td>
                    <td>{{ $barang->nama }}</td>
                    <td>{{ $barang->deskripsi }}</td>
                    <td>
                        @if($barang->stok > 10)
                            <span class="badge" style="background:#2563eb;color:#fff;">{{ $barang->stok }}</span>
                        @elseif($barang->stok > 0)
                            <span class="badge" style="background:#60a5fa;color:#fff;">{{ $barang->stok }}</span>
                        @else
                            <span class="badge" style="background:#fca5a5;color:#991b1b;">Habis</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($barang->harga_sewa, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('barang.show', $barang) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barang.destroy', $barang) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus barang?')">Hapus</button>
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