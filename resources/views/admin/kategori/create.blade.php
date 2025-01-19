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
                <form action="{{ route('admin.kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="{{ old('kategori') }}" required>
                        @error('kategori')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg">Simpan</button>
                    <a href="{{ route('admin.kategori') }}" class="ml-4 px-6 py-2 bg-gray-300 text-gray-700 rounded-lg">Kembali</a>
                </form>
            </div>
        </div>
    </main>
    <!--Main end-->
</section>
@endsection