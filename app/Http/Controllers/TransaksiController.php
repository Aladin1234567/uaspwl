<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Notifikasi;
use App\Models\Pelanggan;
use App\Models\User;
use App\Models\Barang;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'user', 'barang'])->get();
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggans = Pelanggan::all();
        $users = User::all();
        $barangs = Barang::all();
        return view('transaksi.create', compact('pelanggans', 'users', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'waktu_sewa_mulai' => 'required|date',
            'waktu_sewa_selesai' => 'required|date',
            'status' => 'required|string',
        ]);
        $transaksi = Transaksi::create($validated);
        Notifikasi::create([
            'user_id' => 1,
            'pesan' => 'Transaksi #' . $transaksi->id . ' ditambahkan',
        ]);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['pelanggan', 'user', 'barang']);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::all();
        $users = User::all();
        $barangs = Barang::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggans', 'users', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'waktu_sewa_mulai' => 'required|date',
            'waktu_sewa_selesai' => 'required|date',
            'status' => 'required|string',
        ]);
        $transaksi->update($validated);
        Notifikasi::create([
            'user_id' => 1,
            'pesan' => 'Transaksi #' . $transaksi->id . ' diedit',
        ]);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $id = $transaksi->id;
        $transaksi->delete();
        Notifikasi::create([
            'user_id' => 1,
            'pesan' => 'Transaksi #' . $id . ' dihapus',
        ]);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
