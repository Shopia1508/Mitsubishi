@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-xl shadow-sm border border-gray-200">
    <div class="flex items-center gap-2 mb-6 border-b pb-3">
        <a href="{{ route('admin.products.index') }}" class="text-gray-400 hover:text-zinc-900 transition"><i class="fa-solid fa-arrow-left text-sm"></i></a>
        <h2 class="text-lg font-bold text-gray-800 m-0">Tambah Produk Baru</h2>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded px-3 py-2.5 focus:ring-1 focus:ring-red-500 focus:outline-none text-xs" placeholder="Contoh: Mud Guard Triton">
            @error('name') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Kode Produk</label>
                <input type="text" name="product_code" value="{{ old('product_code') }}" required class="w-full border border-gray-300 rounded px-3 py-2.5 focus:ring-1 focus:ring-red-500 focus:outline-none text-xs" placeholder="Contoh: MITS-MDG-01">
                @error('product_code') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Jumlah Stok</label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}" required class="w-full border border-gray-300 rounded px-3 py-2.5 focus:ring-1 focus:ring-red-500 focus:outline-none text-xs">
                @error('stock') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Harga Satuan (Rp)</label>
            <input type="number" name="price" value="{{ old('price') }}" required class="w-full border border-gray-300 rounded px-3 py-2.5 focus:ring-1 focus:ring-red-500 focus:outline-none text-xs" placeholder="Contoh: 150000">
            @error('price') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Gambar Produk</label>
            <div class="border border-dashed border-gray-300 rounded p-4 text-center bg-gray-50">
                <input type="file" name="image" class="w-full text-xs text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white hover:file:bg-zinc-800 cursor-pointer">
                <p class="text-[10px] text-gray-400 mt-2">Format: JPG, JPEG, PNG, WEBP (Maksimal 2MB)</p>
            </div>
            @error('image') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end gap-2 pt-4 border-t mt-6">
            <a href="{{ route('admin.products.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded font-medium transition decoration-none">Batal</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded font-medium transition shadow-sm">
                <i class="fa-solid fa-floppy-disk mr-1"></i> Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection