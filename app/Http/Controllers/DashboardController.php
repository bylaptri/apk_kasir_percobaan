<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data for the dashboard
        $totalProduk = Produk::sum('nama_produk');
        $totalPelanggan = Pelanggan::count(); // Assuming Customer model exists
        $recentProduk = Produk::latest()->take(5)->get(); // Fetch latest 5 sales

        // Pass data to the view
        return view('dashboard.index', [
            'totalProduk' => $totalProduk,
            'totalPelanggan' => $totalPelanggan,
            'recentProduk' => $recentProduk,
        ]);
    }
}
