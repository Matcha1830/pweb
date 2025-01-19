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
    <main class="mt-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold">Edit Status Peminjaman</h1>
        </div>

        <div class="mt-6 bg-white p-6 rounded-lg shadow-lg">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="buku" class="block text-sm font-medium text-gray-700">Buku</label>
                    <input type="text" id="buku" name="buku" value="{{ $pinjam->buku->judul }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                </div>

                <div>
                    <label for="user" class="block text-sm font-medium text-gray-700">Peminjam</label>
                    <input type="text" id="user" name="user" value="{{ $pinjam->user->name }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                </div>

                <div>
                    <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
                    <input type="text" id="tanggal_kembali" name="tanggal_kembali" value="{{ $pinjam->tgl_pengembelian }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Status Peminjaman: {{ $pinjam->status }}</label>
                </div>

                <div class="flex space-x-4">
                    <!-- Tombol untuk mengubah status -->
                    @if($pinjam->status != 'Dikembalikan' && $pinjam->status != 'Terlambat')
                        <a href="{{ route('admin.pinjam.update', ['pinjam' => $pinjam->id, 'status' => 1]) }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Terima</a>
                        <a href="{{ route('admin.pinjam.update', ['pinjam' => $pinjam->id, 'status' => 2]) }}" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Tolak</a>
                    @endif

                    <!-- Tombol untuk status 'Dikembalikan' -->
                    @if($pinjam->status != 'Dikembalikan')
                        <a href="{{ route('admin.pinjam.update', ['pinjam' => $pinjam->id, 'status' => 3]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Sudah Dikembalikan</a>
                    @endif
                </div>
            </div>
        </div>
    </main>
    <!--Main end-->
</section>
@endsection