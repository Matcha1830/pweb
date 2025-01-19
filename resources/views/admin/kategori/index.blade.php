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
        <div class="head-title">
            <div class="left">
                <h1>Dashbord</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="#">Kategori</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route ('admin.kategori.create')}}" class="btn-download">
                <i class="bx bxs-cloud-download"></i>
                <span class="text">Tambah Kategori</span>
            </a>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Kategori</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategory</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <a href="{{ route('admin.kategori.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Edit</a>
                                    <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!--Main end-->
</section>
@endsection