@extends('layouts.admin')
@section('admin')
<section id="content">
    <nav>
        <i class="bx bx-menu"></i>
        <a href="#" class="nav-link">Kategori</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Pencarian..." />
                <button type="submit" class="search-btn">
                    <i class="bx bx-search"></i>
                </button>
            </div>
        </form>
        <input type="checkbox" id="swith-mode" hidden />
        <label for="swith-mode" class="swith-mode"></label>
        <a href="#" class="notification">
            <i class="bx bxs-bell"></i>
            <span class="num">3</span>
        </a>
        <a href="#" class="profile">
            <img src="img/profil.png" alt="Photo profil" />
        </a>
    </nav>
    <!--navbar end-->

    <!--Main-->
    <main>

        <div class="table-data">
            <div class="order">
                <div class="head">
                
                </div>
                <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
    
                    <!-- Input Judul -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Buku</label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" 
                               required>
                    </div>
    
                    <!-- Input Kategori -->
                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select name="kategori_id" id="kategori_id" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" 
                                required>
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $buku->kategori_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <!-- Input Jumlah Buku -->
                    <div class="mb-4">
                        <label for="qty" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Buku</label>
                        <input type="number" name="qty" id="qty" min="1" 
                               value="{{ old('qty', $buku->qty) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" 
                               required>
                    </div>
    
                    <!-- Input Gambar -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Buku (Opsional)</label>
                        <input type="file" name="image" id="image" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" 
                               accept="image/*">
                        @if ($buku->image)
                            <p class="mt-2">Gambar saat ini: 
                                <img src="{{ asset('storage/' . $buku->image) }}" alt="Gambar Buku" class="w-32 h-32 rounded">
                            </p>
                        @endif
                    </div>
    
                    <!-- Input Penulis -->
                    <div class="mb-4">
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                        <input type="text" name="author" id="author" value="{{ old('author', $buku->author) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" 
                               required>
                    </div>
    
                    <!-- Input Sinopsis -->
                    <div class="mb-4">
                        <label for="sinopsis" class="block text-sm font-medium text-gray-700 mb-2">Sinopsis</label>
                        <textarea name="sinopsis" id="sinopsis" rows="5"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" 
                                  required>{{ old('sinopsis', $buku->sinopsis) }}</textarea>
                    </div>
    
                    <!-- Tombol -->
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.buku') }}" 
                           class="ml-4 px-6 py-2 bg-gray-300 text-gray-700 rounded-lg shadow hover:bg-gray-400 transition">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!--Main end-->
</section>
@endsection