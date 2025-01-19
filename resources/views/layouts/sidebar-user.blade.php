<section id="sidebar">
		<a href="#" class="brand"><img src="{{ asset ('img/logo.png')}}" alt="logo"> TK PERPUS</a>
		<ul class="side-menu">
			<li><a href="{{ route ('user.dashboard')}}" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li>
				<a href="#"><i class='bx bxs-layer icon' ></i> Kategori <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					@foreach($categories as $item)
					<li><a href="{{ route ('user.buku.category',$item->id)}}">{{ $item ->kategori}}</a></li>
					@endforeach
				</ul>
			</li>
			<li><a href="{{ route ('user.pinjam') }}"><i class='bx bx-book icon' ></i> Peminjaman</a></li>
			<li><a href="{{ route ('user.pinjam.list')}}"><i class='bx bxs-log-in icon' ></i> Pengembalian</a></li>
			<li class="divider" data-text="table and forms">Table dan Pengaturan</li>
			<li><a href="#"><i class='bx bx-user icon' ></i> Akun</a></li>
			<li>
				<a href="#"><i class='bx bx-slider-alt icon' ></i> Pengaturan <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="#">Tentang</a></li>
					<li><a href="#">Kontak</a></li>
					<li><a href="#">Keluar</a></li>
				</ul>
			</li>
		</ul>

	</section>