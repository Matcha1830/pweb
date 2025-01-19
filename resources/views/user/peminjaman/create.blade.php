@extends('layouts.user')

@section('user')
<div class="content">
    <div class="left-content">
      <div class="card">
        <div class="card-tag">
          <h2>Buku</h2>
          <h3>The Alchemist</h3>
          <p>
            {{ $buku->sinopsis}}
          </p>
        </div>
        <div class="card-img">
          <img
            alt="The Beauty of the Night Book Cover"
            src="{{ asset('storage/' . $buku->image) }}"
          />
        </div>
        <div class="borrow-form">
            <h3>Form Peminjaman Buku</h3>

            <form action="{{ route('user.pinjam.store') }}" method="POST">
                @csrf <!-- Token CSRF untuk keamanan -->
    
                <!-- Input tersembunyi untuk buku_id -->
                <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                
                <!-- Input tersembunyi untuk user_id -->
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    
                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Pengembalian:</label>
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control" required>
                </div>
    
                <div class="button-container">
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                    <a href="{{ route('user.buku') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
      </div>
      
    </div>
  </div>
@endsection