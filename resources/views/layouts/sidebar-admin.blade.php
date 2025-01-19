<section id="sidebar">
    <a href="#" class="brand">
        <i class="bx bxs-book"></i>
        <span class="text">TK PERPUS</span>
    </a>

    <ul class="side-menu top">
		<li>
            <a href="{{route ('admin.dashboard')}}">
                <i class="bx bxs-doughnut-chart"></i>
                <span class="text">Dashbord</span>
            </a>
        </li>
        <li {{ Request::is('pinjam', 'pinjam/*') ? 'active' : '' }}>
            <a href="{{route ('admin.pinjam.index')}}">
                <i class="bx bxs-doughnut-chart"></i>
                <span class="text">Peminjaman</span>
            </a>
        </li>
        <li class="{{ Request::is('', 'kategori/*') ? 'active' : '' }}">
            <a href="{{route ('admin.kategori')}}">
                <i class="bx bxs-dashboard"></i>
                <span class="text">Kategori</span>
            </a>
        </li>
        <li class="{{ Request::is('buku', 'buku/*') ? 'active' : '' }}">
            <a href="{{route ('admin.buku')}}">
                <i class="bx bx-book-open"></i>
                <span class="text">List Buku</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bx bxs-group"></i>
                <span class="text">Akun</span>
            </a>
        </li>
    </ul>

    <ul class="side-menu">
        <li>
            <a href="#">
                <i class="bx bxs-cog"></i>
                <span class="text">Peraturan</span>
            </a>
        </li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout" type="submit">
                    <i class="bx bxs-log-out-circle"></i>
                    <span class="text">Keluar</span>
                </button>
            </form>

        </li>
    </ul>
</section>