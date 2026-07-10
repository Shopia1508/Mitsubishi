@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 m-0">Selamat Datang, Admin Mitsubishi! 👋</h2>
        <p class="text-xs text-gray-400 mt-1">Hari ini adalah waktu yang tepat untuk mengelola katalog digital dealer Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider m-0">Total Ragam Produk</p>
                <h3 class="text-2xl font-black text-zinc-900 m-0 mt-1">
                    {{ $totalProduk ?? 0 }} <span class="text-xs font-normal text-gray-500">Item</span>
                </h3>
            </div>
            <div class="h-12 w-12 bg-red-50 text-red-600 rounded-lg flex items-center justify-center text-xl">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider m-0">Total Stok Gudang</p>
                <h3 class="text-2xl font-black text-zinc-900 m-0 mt-1">
                    {{ $totalStok ?? 0 }} <span class="text-xs font-normal text-gray-500">Pcs</span>
                </h3>
            </div>
            <div class="h-12 w-12 bg-zinc-100 text-zinc-800 rounded-lg flex items-center justify-center text-xl">
                <i class="fa-solid fa-warehouse"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <h3 class="text-sm font-bold text-gray-800 mb-4">Akses Cepat Fitur</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 p-3 rounded-lg border border-gray-100 bg-gray-50 hover:bg-gray-100 transition text-zinc-800 text-xs font-medium decoration-none">
                <div class="h-9 w-9 bg-red-100 text-red-600 rounded flex items-center justify-center text-sm shrink-0">
                    <i class="fa-solid fa-box"></i>
                </div>
                <div>
                    <p class="font-bold m-0 text-gray-800">Kelola Produk</p>
                    <p class="text-[10px] text-gray-400 m-0 mt-0.5">Tambah, ubah, atau hapus item oli & aksesoris</p>
                </div>
            </a>
            
            <a href="{{ route('admin.posters.index') }}" class="flex items-center gap-3 p-3 rounded-lg border border-gray-100 bg-gray-50 hover:bg-gray-100 transition text-zinc-800 text-xs font-medium decoration-none">
                <div class="h-9 w-9 bg-zinc-900 text-white rounded flex items-center justify-center text-sm shrink-0">
                    <i class="fa-solid fa-palette"></i>
                </div>
                <div>
                    <p class="font-bold m-0 text-gray-800">Buka Poster Editor</p>
                    <p class="text-[10px] text-gray-400 m-0 mt-0.5">Buat brosur digital promo Mitsubishi</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection