<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Container\Attributes\Storage;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $bukus = Buku::all();
        return view('admin.buku.index', compact('bukus'));
    }

    public function adminDashboard()
    {
        // Ambil data peminjaman dengan relasi buku dan user
        $bukus = Pinjam::with('buku', 'user')->get();

        // Hitung total semua buku (berdasarkan kolom `qty`)
        $totalBuku = Buku::sum('qty');

        // Kirim data ke view
        return view('admin.dashboard', compact('bukus', 'totalBuku'));
    }


    public function userindex()
    {
        $bukus = Buku::all(); // Menggunakan query builder
        return view('user.dashboard', compact('bukus'));
    }


    public function userall()
    {
        $bukus = Buku::all();
        return view('user.buku.index', compact('bukus'));
    }

    public function userpinjam()
    {
        $bukus = Buku::all();
        return view('user.peminjaman.index', compact('bukus'));
    }
    
    public function usercategory($kategori)
    {
        // Ambil semua buku yang berhubungan dengan kategori ini
        $kategori = Kategori::find($kategori);
        $bukus = $kategori->buku; // Asumsi bahwa relasi antara kategori dan buku adalah 'bukus'

        // Kirim data buku dan kategori ke view
        return view('user.buku.category', compact('bukus', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.buku.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'author' => 'nullable|string|max:255',
            'sinopsis' => 'nullable|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        // Upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('buku-images', 'public');
        }

        // Simpan data buku
        Buku::create([
            'judul' => $request->judul,
            'qty' => $request->qty,
            'image' => $imagePath,
            'author' => $request->author,
            'sinopsis' => $request->sinopsis,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.buku.create')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('user.buku.show',compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        // Ambil semua kategori untuk dropdown
        $kategoris = Kategori::all();

        // Tampilkan view edit buku dengan data buku dan kategori
        return view('admin.buku.edit', compact('buku', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        // Validasi data
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'qty' => 'required|integer|min:1',
            'author' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file gambar baru, upload dan simpan path-nya
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('buku-images', 'public');
            $validatedData['image'] = $imagePath;

            // Hapus gambar lama jika ada
            if ($buku->image) {
                Storage::disk('public')->delete($buku->image);
            }
            
        }

        // Update data buku
        $buku->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.buku')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete(); // Hapus kategori
        return redirect()->route('admin.buku')->with('success', 'Kategori berhasil dihapus!');
    }
}
