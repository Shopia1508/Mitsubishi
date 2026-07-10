@extends('admin.layouts.app')

@section('content')
<div class="w-full bg-white p-6 rounded-xl shadow-sm border border-gray-200">
    <div class="border-b pb-4 mb-6">
        <h2 class="text-lg font-bold text-gray-800 m-0">Upload Poster Promosi</h2>
        <p class="text-xs text-gray-400 mt-1">Unggah file desain banner/brosur promosi dealer langsung ke halaman depan (Maksimal 3 terbaru yang aktif slide)</p>
    </div>
    
    <form action="{{ route('admin.posters.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl bg-gray-50/50 p-6 border-2 border-dashed border-gray-200 rounded-xl mx-auto text-center">
        @csrf
        <div class="mb-4 flex flex-col items-center justify-center">
            <i class="fa-solid fa-images text-4xl text-gray-300 mb-2"></i>
            <label class="block text-xs font-bold text-gray-700 mb-2">Pilih File Desain Poster (Format: JPG, PNG / Max: 2MB)</label>
            <input type="file" name="image" class="w-full max-w-xs border border-gray-300 bg-white rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-red-500" required>
        </div>

        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-6 py-2.5 rounded-lg transition shadow-sm">
            <i class="fa-solid fa-cloud-arrow-up mr-1"></i> Mulai Upload Poster
        </button>
    </form>

    <hr class="my-8 border-gray-100">

    <div>
        <h3 class="text-sm font-bold text-gray-800 mb-4">Daftar Poster Saat Ini</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($posters as $index => $p)
                <div class="border border-gray-200 p-3 rounded-xl bg-gray-50 flex flex-col justify-between">
                    <div>
                        <div class="relative group overflow-hidden rounded-lg">
                            <img src="{{ route('baca.gambar.poster', $p->image) }}" class="w-full aspect-[4/5] object-cover rounded-lg shadow-sm">
                            
                            <div class="absolute top-2 left-2 bg-zinc-900/80 text-white text-[10px] px-2 py-0.5 rounded-full font-medium z-10">
                                {{ $index < 3 ? 'Aktif di Beranda' : 'Arsip' }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex gap-2">
                        <button type="button" onclick="toggleEditForm({{ $p->id }})" class="flex-1 bg-zinc-200 hover:bg-zinc-300 text-zinc-700 text-[11px] font-medium py-2 rounded-lg border-0 cursor-pointer text-center transition">
                            <i class="fa-solid fa-pen-to-square mr-1"></i> Ganti Gambar
                        </button>

                        <form action="{{ route('admin.posters.destroy', $p->id) }}" method="POST" class="m-0 flex-1" onsubmit="return confirm('Apakah kamu yakin ingin menghapus poster ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-100 hover:bg-red-200 text-red-600 text-[11px] font-medium py-2 rounded-lg border-0 cursor-pointer text-center transition">
                                <i class="fa-solid fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </div>

                    <div id="edit-form-{{ $p->id }}" class="hidden mt-3 p-3 bg-white border border-gray-200 rounded-lg">
                        <form action="{{ route('admin.posters.update', $p->id) }}" method="POST" enctype="multipart/form-data" class="m-0">
                            @csrf
                            @method('PUT')
                            <label class="block text-[10px] font-bold text-gray-500 mb-1">Pilih Gambar Baru:</label>
                            <input type="file" name="image" class="w-full text-[11px] mb-2" required>
                            <div class="flex gap-1 justify-end">
                                <button type="button" onclick="toggleEditForm({{ $p->id }})" class="bg-gray-100 text-gray-600 text-[10px] px-2 py-1 rounded border-0 cursor-pointer">Batal</button>
                                <button type="submit" class="bg-blue-600 text-white text-[10px] px-2 py-1 rounded border-0 cursor-pointer">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            @empty
                <p class="col-span-full text-center text-xs text-gray-400 py-6">Belum ada file poster yang diupload.</p>
            @endforelse
        </div>
    </div>
</div>

<script>
    function toggleEditForm(id) {
        const form = document.getElementById(`edit-form-${id}`);
        if (form.classList.contains('hidden')) {
            form.classList.remove('hidden');
        } else {
            form.classList.add('hidden');
        }
    }
</script>
@endsection