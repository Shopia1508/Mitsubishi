@extends('admin.layouts.app')

@section('content')
<div class="w-full bg-white p-6 rounded-xl shadow-sm border border-gray-200">
    <div class="flex justify-between items-center mb-6 gap-4">
        <div>
            <h2 class="text-lg font-bold text-gray-800 m-0">{{ __('Manajemen Produk') }}</h2>
            <p class="text-xs text-gray-400 mt-1">Kelola daftar produk, kode, harga, serta stok suku cadang dealer</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-4 py-2 rounded transition shadow-sm decoration-none flex items-center gap-1.5">
            <i class="fa-solid fa-plus"></i> Tambah Produk
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-xs">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 font-semibold uppercase tracking-wider text-[10px]">
                    <th class="p-3">Gambar</th>
                    <th class="p-3">Nama Produk</th>
                    <th class="p-3">Kode Produk</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
                @foreach($products as $product)
                <tr class="hover:bg-gray-50/80 transition">
                    <td class="p-3">
                        @if($product->image)
                            <img src="{{ route('baca.gambar', basename($product->image)) }}" alt="{{ $product->name }}" class="h-10 w-10 object-contain rounded border bg-gray-50">
                        @else
                            <div class="h-10 w-10 bg-gray-100 border border-gray-200 rounded flex items-center justify-center text-[8px] text-gray-400">
                                Kosong
                            </div>
                        @endif
                    </td>
                    
                    <td class="p-3 font-medium text-gray-900">{{ $product->name }}</td>
                    <td class="p-3 text-gray-500 font-mono">{{ $product->product_code }}</td>
                    <td class="p-3 font-semibold text-gray-800">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    
                    <td class="p-3">
                        <div class="flex justify-center gap-1.5">
                            <a href="{{ route('admin.products.edit', $product) }}" class="bg-zinc-800 hover:bg-zinc-700 text-white px-3 py-1.5 rounded transition text-[10px] decoration-none flex items-center gap-1" title="Edit Data">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection