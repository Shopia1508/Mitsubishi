<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mitsubishi Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<body class="bg-gray-100 font-sans text-gray-800">

    <div class="flex h-screen overflow-hidden">
        
        <nav class="sidebar w-64 bg-zinc-900 text-gray-300 flex flex-col justify-between shadow-lg shrink-0">
            <div>
                <div class="logo p-5 flex items-center gap-3 border-b border-zinc-800">
                    <img src="{{ asset('images/lg.png') }}" class="w-12 h-12" alt="logo">
                    <span class="font-bold text-white tracking-wider text-xs">MITSUBISHI ADMIN</span>
                </div>
                
                <ul class="mt-5 px-3 space-y-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-zinc-800 transition text-sm {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-800 text-white font-medium' : '' }}">
                            <i class="fa-solid fa-gauge w-5"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-zinc-800 transition text-sm {{ request()->routeIs('products.*') ? 'bg-zinc-800 text-white font-medium' : '' }}">
                            <i class="fa-solid fa-box w-5"></i> Produk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.posters.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-zinc-800 transition text-sm {{ request()->routeIs('posters.*') ? 'bg-zinc-800 text-white font-medium' : '' }}">
                            <i class="fa-solid fa-images w-5"></i> Poster
                        </a>
                    </li>
                </ul>
            </div>

            <div class="p-4 border-t border-zinc-800">
                <form action="{{ route('admin.logout') }}" method="POST" class="inline-block w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-xs text-red-400 hover:bg-zinc-800 rounded transition">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</button>
                </form>
            </div>
        </nav>

        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 border-b border-gray-200 sticky top-0 z-50">
                <div class="flex items-center gap-4">
                    <i class="fa-solid fa-bars text-gray-600 cursor-pointer"></i>
                    <span class="text-xs text-gray-400 font-medium">Sistem Manajemen Dealer</span>
                </div>
                <div class="flex items-center gap-4">
                    <i class="fa-regular fa-bell text-gray-600 text-lg cursor-pointer"></i>
                    <div class="flex items-center gap-2 border-l pl-4 border-gray-200">
                        <div class="h-7 w-7 rounded-full bg-red-600 flex items-center justify-center text-white font-bold text-xs">A</div>
                        <span class="text-xs font-semibold text-gray-700">Administrator</span>
                    </div>
                </div>
            </header>

            <div class="main-content p-8 flex-1">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded-lg text-xs font-medium">
                        {{ session('success') }}
                    </div>
                @endif
                
                @yield('content')
            </div>

        </div>
    </div>

</body>
</html>