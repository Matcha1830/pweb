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
                        <a class="active" href="#">List Buku</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route ('admin.buku.create')}}" class="btn-download">
                <i class="bx bxs-cloud-download"></i>
                <span class="text">Tambah Buku</span>
            </a>
        </div>

        <ul class="box-info">
            <li>
                <i class="bx bxs-calendar-check"></i>
                <span class="text">
                    <h3>{{ $peminjaman }}</h3>
                    <p>Peminjaman</p>
                </span>
            </li>
            <li>
                <i class="bx bxs-group"></i>
                <span class="text">
                    <h3>{{ $pengembalian }}</h3>
                    <p>Pengembalian</p>
                </span>
            </li>
            <li>
                <i class="bx bxs-dollar-circle"></i>
                <span class="text">
                    <h3>{{ $totalPeminjaman }}</h3>
                    <p>Total Peminjaman</p>
                </span>
            </li>
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>List Buku</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Qty</th>
                            <th>Kategory</th>
                            <th>Author</th>
                            <th>Cover</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukus as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->kategori->kategori }}</td>
                            <td>{{ $item->author }}</td>
                            <td>
                                <img class="img-buku" src="{{ asset('storage/' . $item->image) }}" alt="img- 1" />
                            </td>
                            <td>
                                    <a class="status completed" href="{{ route ('admin.buku.edit' ,  $item->id) }}"> Edit</a>
                                    <form action="{{ route ('admin.buku.destroy', $item->id)}}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="status pending"> Delete</button>
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