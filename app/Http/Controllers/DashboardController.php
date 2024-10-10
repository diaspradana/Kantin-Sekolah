<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TopUp;
use App\Models\Produk;
use App\Models\Wallet;
use App\Models\Transaksi;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keranjang;

class DashboardController extends Controller
{
    public function adminindex()
    {
        $title = 'Dashboard';
        $users = User::all();
        return view('admin.index', compact('title', 'users'));
    }

    public function kantinIndex()
    {
        $title = 'Dashboard';
        $produks = Produk::all();
        // Mendapatkan data transaksi
        $transaksis = Transaksi::all();
        // Menghitung jumlah transaksi
        $jumlahTransaksi = $transaksis->count();

        return view('kantin.index', compact('title', 'jumlahTransaksi', 'produks', 'transaksis'));
    }



    public function bankIndex()
    {
        $title = 'Dashboard';
        $customers = User::where('role', 'customer')->get();
        $wallets = Wallet::all();
        $requestTopups = TopUp::all();
        $requestWithdrawals = Withdrawal::all();
        return view('bank.index', compact('title', 'customers', 'wallets', 'requestTopups', 'requestWithdrawals'));
    }

    
    public function customerIndex()
    {
        $title = 'Dashboard';
        $produks = Produk::all();
        $wallet = Wallet::where('id_user', auth()->user()->id)->first();
        $keranjangs = Keranjang::all();
        return view('customer.index', compact('title', 'wallet', 'produks', 'keranjangs'));
    }
}
