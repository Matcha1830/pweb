@extends('layouts.user')

@section('user')
<div class="content">
    <div class="left-content">

        <div class="trending">
            <div class="tren">
                <h2>List Buku</h2>
            </div>
            <div class="trending-book">
                <div class="book-list">
                    @foreach($bukus as $book)
                    <div class="book-item">
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }} Book Cover" />
                        <p>{{ $book->judul }}</p>
                        <span>by {{ $book->author }}</span>
                        <a href="{{ route ('user.buku.show', $book->id)}}" class="btn-book">Lihat</a>
                    </div>
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection