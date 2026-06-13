<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang Kampus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans">
    <div class="min-h-screen flex flex-col md:flex-row">

        <div class="w-full md:w-64 bg-slate-900 text-white p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center space-x-3 mb-8">
                    <i class="fa-solid fa-graduation-cap text-2xl text-indigo-400"></i>
                    <span class="text-xl font-bold">Sewa Ruang Kampus</span>
                </div>

                <nav class="space-y-2">
                    <a href="/dashboard" class="block p-3 rounded transition {{ Request::is('dashboard') ? 'bg-indigo-600 font-semibold' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-chart-pie mr-2"></i> Dashboard
                    </a>
                    <a href="/booking" class="block p-3 rounded transition {{ Request::is('booking') ? 'bg-indigo-600 font-semibold' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-list mr-2"></i> Daftar Pinjaman
                    </a>
                    <a href="/booking/create" class="block p-3 rounded transition {{ Request::is('booking/create') ? 'bg-indigo-600 font-semibold' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-calendar-plus mr-2"></i> Form Booking
                    </a>

                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <a href="/ruangan" class="block p-3 rounded transition {{ Request::is('ruangan*') ? 'bg-indigo-600 font-semibold' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-tasks mr-2"></i> Kelola Ruangan (Admin)
                    </a>
                    @endif
                </nav>
            </div>

            <div class="mt-8 pt-4 border-t border-slate-800">
                <form action="/logout" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 p-3 text-red-400 hover:text-red-300 hover:bg-slate-800 rounded transition duration-200 font-medium text-sm text-left cursor-pointer">
                        <i class="fa-solid fa-arrow-right-from-bracket w-5"></i>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="flex-1 p-6 md:p-10 overflow-y-auto">
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm flex items-center shadow-sm">
                    <i class="fa-solid fa-triangle-exclamation mr-2 text-base"></i>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>

    </div>
</body>
</html>
