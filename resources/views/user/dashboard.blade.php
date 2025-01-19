@extends('layouts.user')

@section('user')
<div class="content">
    <div class="left-content">
        <div class="card">
            <div class="card-tag">
                <h2>Buku</h2>
                <h3>The Alchemist</h3>
                <p>
                    Novel berjudul The Alchemist (Sang Alkemis) salah satu buku yang berhasil menduduki best seller dan pertama kali diterbitkan pada tahun 1988. Novel yang ditulis oleh Paulo Coelho ini, diklaim dapat mengubah hidup bagi para pembacanya. Hal tersebut barangkali yang menjadikan daya tarik novel ini. Di dalamnya memuat beberapa pertanyaan dalam hidup yang membuat hati dan pikiran ini tergerakkan.
                </p>
                

            </div>
            <div class="card-img">
                <img
                    alt="The Beauty of the Night Book Cover"
                    src="img/book_7.jpg" />
            </div>
        </div>

        <div class="trending">
            <div class="tren">
                <h2>List Buku</h2>
                <a href="#"> See All </a>
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

                    {{-- <div class="book-item">
                        <img
                            alt="The Black Universe Book Cover"

                            src="img/book_8.jpg" />
                        <p>A Minor Fall</p>
                        <span> by Greta Moe Evans </span>
                        <a href="#" class="btn-book">Lihat</a>
                    </div>
                    <div class="book-item">
                        <img
                            alt="Nefarious Games Book Cover"

                            src="img/book_9.jpg" />
                        <p>Body Works The Dark</p>
                        <span> by Ana Park </span>
                        <a href="#" class="btn-book">Lihat</a>
                    </div>
                    <div class="book-item">
                        <img
                            alt="The Four of Us Book Cover"

                            src="img/book_1.jpg" />
                        <p>Swing In The House</p>
                        <span> by Claudia Wilson </span>
                        <a href="#" class="btn-book">Lihat</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="right-content">
        <div class="join-card">
            <h2>Daftar Menjadi Anggota TK PERPUS Sekarang</h2>
            <a class="btn" href="#"> Daftar Sekarang </a>
        </div>
        <div class="book-of-the-year">
            <h2>Buku Peminjaman Terbanyak</h2>
            <ul>
                <li>
                    <img
                        alt="Happiness is habit Book Cover"
                        src="img/book_5.jpg" />
                    <div>
                        <p>Happiness is habit</p>
                        <span> by Margarita Perez </span>
                    </div>
                </li>
                <li>
                    <img
                        alt="The value of Design Book Cover"
                        src="img/book_6.jpg" />
                    <div>
                        <p>The Great Gastby</p>
                        <span> by Patrick Ness </span>
                    </div>
                </li>
                <li>
                    <img
                        alt="The Guardian of Life Book Cover"
                        src="img/book_7.jpg" />
                    <div>
                        <p>The Alchemist</p>
                        <span> by Eric Drooker </span>
                    </div>
                </li>
                <li>
                    <img
                        alt="Friend Book Cover"
                        src="img/book_8.jpg" />
                    <div>
                        <p>A Minor Fall</p>
                        <span> by Daniel Gallego </span>
                    </div>
                </li>
                <li>
                    <img
                        alt="How to be Creative Book Cover"
                        src="img/book_10.jpg" />
                    <div>
                        <p>How To be Creative</p>
                        <span> by Kumbakonam </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection