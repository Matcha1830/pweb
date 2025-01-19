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
                        <a class="active" href="#">Peminjaman</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Peminjaman Buku</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Peminjam</th>
                            <th>Judul</th>
                            <th>Qty</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Kategory</th>
                            <th>Status</th>
                            <th>Cover</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukus as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->buku->qty }}</td>
                            <td>{{ $item->tgl_pengembelian }}</td>
                            <td>{{ $item->buku->kategori->kategori }}</td>
                            <td>
                                @if($item->status == 0)
                                    pending
                                @elseif($item->status == 1)
                                    Diterima
                                @elseif($item->status == 2)
                                    Ditolak
                                @elseif($item->status == 3)
                                    Dikembalikan
                                @endif
                            </td>
                            <td>
                                <img class="img-buku" src="{{ asset('storage/' . $item->buku->image) }}" alt="img- 1" />
                            </td>
                            <td>
                                    <a class="status pending" href="{{ route ('admin.pinjam.edit', $item->id) }}"> Edit</a>

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