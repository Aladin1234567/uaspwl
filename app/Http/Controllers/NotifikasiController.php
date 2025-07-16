<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasis = Notifikasi::orderBy('created_at', 'desc')->get();
        return view('notifikasi.index', compact('notifikasis'));
    }
} 