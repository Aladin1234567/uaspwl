<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Notifikasi;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga_sewa' => 'required|numeric|min:0',
        ]);
        $barang = Barang::create($validated);
        Notifikasi::create([
            'user_id' => 1,
            'pesan' => 'Barang ' . $barang->nama . ' ditambahkan',
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga_sewa' => 'required|numeric|min:0',
        ]);
        $barang->update($validated);
        Notifikasi::create([
            'user_id' => 1,
            'pesan' => 'Barang ' . $barang->nama . ' diedit',
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy(Barang $barang)
    {
        $nama = $barang->nama;
        $barang->delete();
        Notifikasi::create([
            'user_id' => 1,
            'pesan' => 'Barang ' . $nama . ' dihapus',
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
