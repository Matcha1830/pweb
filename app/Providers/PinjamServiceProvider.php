<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Pinjam;
class PinjamServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    // Membagikan data statistik ke semua view
    View::composer('*', function ($view) {
        $peminjaman = Pinjam::where('status', 'pending')->count();
        $pengembalian = Pinjam::where('status', 'returned')->count();
        $totalPeminjaman = Pinjam::count();

        $view->with('peminjaman', $peminjaman)
             ->with('pengembalian', $pengembalian)
             ->with('totalPeminjaman', $totalPeminjaman);
    });
    }
}
