@extends('layout')

@section('content')
<div class="space-y-8">
    <div class="bg-gradient-to-r from-slate-900 to-indigo-950 p-6 rounded-2xl shadow-md text-white">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-indigo-500/20 rounded-xl border border-indigo-500/30">
                <i class="fa-solid fa-user-shield text-3xl text-amber-400"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Selamat Datang, Super Admin! 🔥</h1>
                <p class="text-sm text-indigo-200 mt-1">Anda masuk sebagai Administrator SIPERU. Di sini Anda bisa mengontrol penuh seluruh data ruangan dan perizinan kampus.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-xs flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Aset Kampus</p>
                <h3 class="text-xl font-bold text-slate-800">Master Ruangan</h3>
                <p class="text-xs text-slate-500 pt-1">Atur ketersediaan & kapasitas</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 text-xl">
                <i class="fa-solid fa-door-open"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-xs flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Aktivitas Peminjaman</p>
                <h3 class="text-xl font-bold text-slate-800">Daftar Pengajuan</h3>
                <p class="text-xs text-slate-500 pt-1">Pantau rincian peminjaman</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 text-xl">
                <i class="fa-solid fa-book-bookmark"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-xs flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Koneksi Database</p>
                <h3 class="text-xl font-bold text-emerald-600 flex items-center">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-pulse"></span> MongoDB Connected
                </h3>
                <p class="text-xs text-slate-500 pt-1">Status integrasi server aman</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 text-xl">
                <i class="fa-solid fa-server"></i>
            </div>
        </div>

    </div>

    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-xs">
        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center">
            <i class="fa-solid fa-bolt text-indigo-500 mr-2 text-sm"></i> Tindakan Cepat Administrator
        </h3>
        <div class="flex flex-wrap gap-3">
            <a href="/ruangan" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition shadow-sm cursor-pointer">
                <i class="fa-solid fa-tasks mr-2"></i> Buka Manajemen Ruangan
            </a>
            <a href="/ruangan/create" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-900 text-white text-sm font-medium rounded-lg transition shadow-sm cursor-pointer">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Ruangan Baru
            </a>
        </div>
    </div>
</div>
@endsection
