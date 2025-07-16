@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('head')
<style>
    body { background: rgb(230,240,255) !important; }
</style>
@endsection

@section('content')
<div class="container">
    <h2 class="mb-4" style="color:#3b82f6;font-weight:bold;">Daftar Transaksi</h2>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">+ Tambah Transaksi</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle" style="background:#e0f2fe;color:#1e293b;border-radius:12px;overflow:hidden;">
            <thead style="background:#3b82f6;color:#fff;">
                <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Barang</th>
                    <th>User</th>
                    <th>Waktu Sewa</th>
                    <th>Waktu Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $i => $transaksi)
                <tr style="background:{{ $i%3==0 ? '#dbeafe' : ($i%3==1 ? '#e0e7ff' : '#bae6fd') }};">
                    <td><span class="badge" style="background:#3b82f6;color:#fff;">#{{ $transaksi->id }}</span></td>
                    <td>{{ $transaksi->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $transaksi->barang->nama ?? '-' }}</td>
                    <td>{{ $transaksi->user->name ?? '-' }}</td>
                    <td>{{ $transaksi->waktu_sewa_mulai }}</td>
                    <td>{{ $transaksi->waktu_sewa_selesai }}</td>
                    <td>
                        @if($transaksi->status == 'proses')
                            <span class="badge" style="background:#60a5fa;color:#fff;">Proses</span>
                        @elseif($transaksi->status == 'selesai')
                            <span class="badge" style="background:#2563eb;color:#fff;">Selesai</span>
                        @else
                            <span class="badge" style="background:#fca5a5;color:#991b1b;">Batal</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('transaksi.show', $transaksi) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('transaksi.edit', $transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus transaksi?')">Hapus</button>
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