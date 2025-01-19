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
        
      </div>
      
    </div>
  </div>
@endsection