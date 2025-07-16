@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="container">
    <h2>Detail Transaksi</h2>
    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">Transaksi #{{ $transaksi->id }}</h4>
            <p class="card-text"><strong>Pelanggan:</strong> {{ $transaksi->pelanggan->nama ?? '-' }}</p>
            <p class="card-text"><strong>User:</strong> {{ $transaksi->user->name ?? '-' }}</p>
            <p class="card-text"><strong>Barang:</strong> {{ $transaksi->barang->nama ?? '-' }}</p>
            <p class="card-text"><strong>Waktu Sewa Mulai:</strong> {{ $transaksi->waktu_sewa_mulai }}</p>
            <p class="card-text"><strong>Waktu Sewa Selesai:</strong> {{ $transaksi->waktu_sewa_selesai }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($transaksi->status) }}</p>
        </div>
    </div>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection 