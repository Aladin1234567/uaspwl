@extends('layouts.app')

@section('title', 'Notifikasi Aktivitas')

@section('head')
<style>
    body { background: rgb(230,240,255) !important; }
</style>
@endsection

@section('content')
<div class="container">
    <h2 class="mb-4" style="color:#3b82f6;font-weight:bold;">Notifikasi Aktivitas</h2>
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle" style="background:#e0f2fe;color:#1e293b;border-radius:12px;overflow:hidden;">
            <thead style="background:#3b82f6;color:#fff;">
                <tr>
                    <th>ID</th>
                    <th>Pesan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notifikasis as $i => $notifikasi)
                <tr style="background:{{ $i%3==0 ? '#dbeafe' : ($i%3==1 ? '#e0e7ff' : '#bae6fd') }};">
                    <td><span class="badge" style="background:#3b82f6;color:#fff;">#{{ $notifikasi->id }}</span></td>
                    <td>{{ $notifikasi->pesan }}</td>
                    <td><span class="badge" style="background:#2563eb;color:#fff;">{{ $notifikasi->created_at->format('d-m-Y H:i') }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="/dashboard" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
@endsection 