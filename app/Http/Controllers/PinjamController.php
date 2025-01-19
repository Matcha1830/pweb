<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::id();

        // Ambil semua buku yang pernah atau sedang dipinjam oleh user yang sedang login
        $bukus = Pinjam::with('buku') // Mengambil relasi buku
        ->where('user_id', $user)
        ->get();
        
        // Kirim data ke view
        return view('user.peminjaman.list', compact('bukus'));
    }

    public function adminindex()
    {

        // Ambil semua buku yang pernah atau sedang dipinjam oleh user yang sedang login
        $bukus = Pinjam::with('buku','user') // Mengambil relasi buku
        ->get();
        
        // Kirim data ke view
        return view('admin.peminjaman.index', compact('bukus'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Buku $buku)
    {
        return view('user.peminjaman.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data peminjaman
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_kembali' => 'required|date|after:today',
        ]);

        // Simpan peminjaman
        Pinjam::create([
            'buku_id' => $request->buku_id,
            'user_id' => $request->user_id,
            'tgl_pengembelian' => $request->tanggal_kembali,
        ]);

        return redirect()->route('user.pinjam')->with('success', 'Peminjaman berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        return view('user.peminjaman.show', compact('pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjam $pinjam)
    {
        $now = now(); // Waktu sekarang
        if ($pinjam->tgl_pengembelian < $now && $pinjam->status != '3') {
            $pinjam->status = 4; // Ganti status jika terlambat
            $pinjam->save();
        }
        return view('admin.peminjaman.edit', compact('pinjam'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pinjamId, $status)
    {
        // Validasi status yang valid
        $validStatuses = [1, 0, 2, 3, 4];
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Status tidak valid');
        }
    
        // Ambil data peminjaman
        $pinjam = Pinjam::findOrFail($pinjamId);
        $pinjam->status = $status;
        $pinjam->save();

        return redirect()->route('admin.pinjam.index')->with('success', 'Status peminjaman diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function listPeminjam()
    {
        $peminjams = Pinjam::with('user', 'buku')->get();
        return view('pinjam.list', compact('peminjams'));
    }
}