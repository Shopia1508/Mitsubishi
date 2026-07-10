<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mitsubishi Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-zinc-950 flex items-center justify-center h-screen font-sans px-4">

    <div class="w-full max-w-sm bg-zinc-900 border border-zinc-800 p-8 rounded-2xl shadow-xl text-gray-300">
        
        <div class="flex flex-col items-center text-center mb-8">
            <img src="{{ asset('images/lg.png') }}" class="w-16 h-16 mb-4 mx-auto" alt="logo">
            <h2 class="text-white font-black tracking-wider text-xl uppercase">MITSUBISHI MOTORS</h2>
            <p class="text-sm text-gray-500 mt-1">Sistem Manajemen Admin Dealer</p>
        </div>

        @if(session('error'))
            <div class="mb-4 p-3 bg-red-950 border border-red-900 text-red-400 rounded-lg text-xs font-medium flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4 text-xs">
            @csrf

            <div>
                <label class="block text-gray-400 font-semibold mb-1.5 uppercase tracking-wide">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-zinc-950 border border-zinc-800 rounded-lg pl-9 pr-3 py-2.5 text-white focus:ring-1 focus:ring-red-600 focus:border-red-600 focus:outline-none transition placeholder-gray-600" placeholder="Isi Username Anda">
                </div>
                @error('email')
                    <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-400 font-semibold mb-1.5 uppercase tracking-wide">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" required class="w-full bg-zinc-950 border border-zinc-800 rounded-lg pl-9 pr-3 py-2.5 text-white focus:ring-1 focus:ring-red-600 focus:border-red-600 focus:outline-none transition placeholder-gray-600" placeholder="Isi Kata Sandi">
                </div>
                @error('password')
                    <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 rounded-lg shadow-md hover:shadow-lg transition flex items-center justify-center gap-2 text-xs uppercase tracking-wider">
                    Masuk <i class="fa-solid fa-arrow-right-to-bracket text-[10px]"></i>
                </button>
            </div>
        </form>

        <div class="text-center mt-6 text-[10px] text-gray-600">
            &copy; 2026 Mitsubishi Motors Admin Panel.
        </div>
    </div>

</body>
</html>