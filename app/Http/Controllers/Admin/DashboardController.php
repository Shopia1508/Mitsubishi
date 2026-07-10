<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; 

class DashboardController extends Controller 
{
    // KODE LAMA LOGIN & LOGOUT (TETAP AMAN)
    public function index()
    {
        return view('admin.login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' =>['required', 'email'],
            'password' =>['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
         return back()->with('error', 'Email Atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    // KODE DASHBOARD YANG DISESUAIKAN (MENGGUNAKAN ALL)
    public function dashboard()
    {
        // Mengambil data statistik singkat untuk dipajang di dashboard
        $totalProduk = Product::count();
        $totalStok = Product::sum('stock');
    
        // Memanggil file view khusus dashboard, bukan view produk!
        return view('admin.dashboard', compact('totalProduk', 'totalStok'));
    }
}