<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $request) {
        return view('pages.admin.dashboard',
        [
            // mengambil data untuk ditampilkan di halaman dashboard
            'travel_package' => TravelPackage::count(),
            'transaction' => Transaction::count(),
            // kondisional untuk status transaksi
            'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count()
        ]
    );
    }
}
