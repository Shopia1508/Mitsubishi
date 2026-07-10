@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-xl shadow-sm border border-gray-200">
    <div class="flex items-center gap-2 mb-6 border-b pb-3">
        <a href="{{ route('admin.products.index') }}" class="text-gray-400 hover:text-zinc-900 transition"><i class="fa-solid fa-arrow-left text-sm"></i></a>
        <h2 class="text-lg font-bold text-gray-800 m-0">Edit Produk: {{ $product->name }}</h2>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full border border-gray-300 rounded px-3 py-2.5 focus:ring-1 focus:ring-red-500 focus:outline-none text-xs">
            @error('name') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Kode Produk</label>
                <input type="text" name="product_code" value="{{ old('product_code', $product->product_code) }}" required class="w-full border border-gray-300 rounded px-3 py-2.5 focus:ring-1 focus:ring-red-500 focus:outline-none text-xs">
                @error('product_code') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Jumlah Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required class="w-full border border-gray-300 rounded px-3 py-2.5 focus:ring-1 focus:ring-red-500 focus:outline-none text-xs">
                @error('stock') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Harga Satuan (Rp) <span class="text-gray-400 font-normal">(Jangan pakai titik!)</span></label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" required class="w-full border border-gray-300 rounded px-3 py-2.5 focus:ring-1 focus:ring-red-500 focus:outline-none text-xs">
            @error('price') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">Ganti Gambar Produk</label>
            <div class="flex items-center gap-4 p-3 border border-gray-200 rounded bg-gray-50">
                @if($product->image)
                    <img src="{{ route('baca.gambar', basename($product->image)) }}" alt="{{ $product->name }}" class="h-14 w-14 object-contain rounded border bg-white">
                @else
                    <div class="h-14 w-14 bg-gray-200 rounded flex items-center justify-center text-[10px] text-gray-400">No Image</div>
                @endif
                <div class="flex-1">
                    <input type="file" name="image" class="w-full text-xs text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white hover:file:bg-zinc-800 cursor-pointer">
                    <p class="text-[10px] text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                </div>
            </div>
            @error('image') <p class="text-red-500 mt-1 text-[10px]">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end gap-2 pt-4 border-t mt-6">
            <a href="{{ route('admin.products.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded font-medium transition decoration-none">Batal</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded font-medium transition shadow-sm">
                <i class="fa-solid fa-floppy-disk mr-1"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection