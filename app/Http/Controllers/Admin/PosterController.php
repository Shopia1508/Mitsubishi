<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poster;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{
    // 1. TAMPILKAN HALAMAN UTAMA POSTER DI ADMIN
    public function index()
    {
        $posters = Poster::latest()->get();
        return view('admin.posters.index', compact('posters'));
    }

    // 2. FUNGSI UNTUK SIMPAN UPLOAD POSTER BARU
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/posters', $filename);

            Poster::create([
                'image' => $filename
            ]);
        }

        return redirect()->route('admin.posters.index')->with('success', 'Foto poster promosi berhasil diupload!');
    }

    // 🔑 3. FUNGSI EDIT / UPDATE GAMBAR POSTER (YANG TADI BELUM ADA)
    public function update(Request $request, Poster $poster)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus file fisik gambar lama dari folder storage biar hemat space
            if (Storage::exists('public/posters/' . $poster->image)) {
                Storage::delete('public/posters/' . $poster->image);
            }

            // Upload file gambar baru
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/posters', $filename);

            // Simpan perubahan ke database
            $poster->update([
                'image' => $filename
            ]);
        }

        return redirect()->route('admin.posters.index')->with('success', 'Poster promosi berhasil diperbarui!');
    }

    // 🔑 4. FUNGSI HAPUS POSTER (YANG TADI BELUM ADA)
    public function destroy(Poster $poster)
    {
        // Hapus file fisik gambar dari folder storage sebelum datanya dihapus
        if (Storage::exists('public/posters/' . $poster->image)) {
            Storage::delete('public/posters/' . $poster->image);
        }

        // Hapus data baris di database MySQL
        $poster->delete();

        return redirect()->route('admin.posters.index')->with('success', 'Poster promosi berhasil dihapus!');
    }
}   