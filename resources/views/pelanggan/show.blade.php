@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
<div class="container">
    <h2>Detail Pelanggan</h2>
    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">{{ $pelanggan->nama }}</h4>
            <p class="card-text"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p class="card-text"><strong>Telepon:</strong> {{ $pelanggan->telepon }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $pelanggan->email }}</p>
        </div>
    </div>
    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection 