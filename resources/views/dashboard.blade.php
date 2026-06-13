@extends('layout')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
        <p class="text-sm text-slate-500">Pemantauan status fasilitas dan ruangan kampus secara real-time.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-400">TOTAL RUANGAN</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">{{ $ruangans->count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-indigo-50 rounded-lg flex items-center justify-center text-indigo-600 text-xl">
                <i class="fa-solid fa-door-open"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-400">TERSEDIA / KOSONG</p>
                <h3 class="text-3xl font-bold text-emerald-600 mt-1">
                    {{ $ruangans->where('status', 'tersedia')->count() }}
                </h3>
            </div>
            <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-600 text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-400">SEDANG DIBOOKING</p>
                <h3 class="text-3xl font-bold text-rose-600 mt-1">
                    {{ $ruangans->where('status', 'tidak tersedia')->count() }}
                </h3>
            </div>
            <div class="w-12 h-12 bg-rose-50 rounded-lg flex items-center justify-center text-rose-600 text-xl">
                <i class="fa-solid fa-user-lock"></i>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-lg font-bold text-slate-800 mb-4">Peta Status Ruangan Kampus</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($ruangans as $r)
                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="px-2.5 py-0.5 text-xs font-bold bg-slate-100 text-slate-600 rounded">
                                {{ $r->kode_ruangan ?? 'KAMPUS' }}
                            </span>
                            @if(($r->status ?? 'tersedia') == 'tersedia')
                                <span class="px-2.5 py-1 text-xs font-semibold bg-emerald-100 text-emerald-800 rounded-full flex items-center">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 inline-block animate-pulse"></span>
                                    Tersedia
                                </span>
                            @else
                                <span class="px-2.5 py-1 text-xs font-semibold bg-rose-100 text-rose-800 rounded-full flex items-center">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-1.5 inline-block"></span>
                                    Di-Booking
                                </span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-slate-800">{{ $r->nama_ruangan }}</h3>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $r->lokasi }}</p>
                        <div class="mt-3 bg-slate-50 p-3 rounded-lg border border-slate-100">
                            <span class="font-semibold text-[11px] text-slate-400 block uppercase tracking-wider mb-1">Fasilitas:</span>
                            <p class="text-xs text-slate-600 leading-relaxed">{{ $r->fasilitas ?? 'Fasilitas standar ruang kuliah.' }}</p>
                        </div>
                    </div>
                    <div class="mt-5 pt-3 border-t border-slate-100 flex items-center justify-between text-sm">
                        <span class="text-xs text-slate-500 font-medium">Max {{ $r->kapasitas }} Orang</span>
                        @if(($r->status ?? 'tersedia') == 'tersedia')
                            <a href="/booking/create" class="px-3 py-1.5 bg-indigo-600 text-white rounded-lg text-xs font-medium hover:bg-indigo-700 transition shadow-sm">Pesan Ruangan</a>
                        @else
                            <button disabled class="px-3 py-1.5 bg-slate-100 text-slate-400 rounded-lg text-xs font-medium cursor-not-allowed">Tidak Tersedia</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
