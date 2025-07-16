@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="container">
    <h2>Detail Barang</h2>
    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">{{ $barang->nama }}</h4>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $barang->deskripsi }}</p>
            <p class="card-text"><strong>Stok:</strong> {{ $barang->stok }}</p>
            <p class="card-text"><strong>Harga Sewa:</strong> Rp {{ number_format($barang->harga_sewa, 2, ',', '.') }}</p>
        </div>
    </div>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection 