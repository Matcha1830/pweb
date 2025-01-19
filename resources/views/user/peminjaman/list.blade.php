@extends('layouts.user')

@section('user')
<div class="content">
    <div class="left-content">
        <div class="card">
<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Pengembalian Buku</h3>
            <i class="bx bx-filter"></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Qty</th>
                    <th>Kategory</th>
                    <th>Cover</th>
                    <th>Author</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bukus as $item)
                <tr>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->buku->qty }}</td>
                    <td>{{ $item->buku->kategori->kategori }}</td>
                    <td>
                        <img class="img-buku" src="{{ asset('storage/' . $item->buku->image) }}" alt="img- 1" />
                    </td>
                    <td>{{ $item->buku->author }}</td>
                    <td>
                        @if($item->status == 0)
                            Pending
                        @elseif($item->status == 1)
                            Diterima
                        @elseif($item->status == 2)
                            Ditolak
                        @elseif($item->status == 3)
                            Dikembalikan
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>
</div>

@endsection