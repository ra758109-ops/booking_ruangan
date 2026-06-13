@extends('layout')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Status & Jadwal Penggunaan Ruangan</h1>
            <p class="text-sm text-slate-500">Seluruh civitas kampus bisa melihat ruangan yang sedang terpakai.</p>
        </div>
        <a href="/booking/create" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm font-medium shadow">+ Booking Ruangan</a>
    </div>

    <div class="bg-white p-4 rounded-xl border border-slate-200 mb-6 flex items-center justify-between">
        <form action="/booking" method="GET" class="flex items-center space-x-3 w-full md:w-auto">
            <label class="text-sm font-medium text-slate-600">Filter Status:</label>
            <select name="status" onchange="this.form.submit()" class="border rounded-lg px-3 py-1.5 bg-slate-50 text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
                <option value="">Semua Status</option>
                <option value="dibooking" {{ request('status') == 'dibooking' ? 'selected' : '' }}>Di-Booking</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs font-semibold uppercase border-b border-slate-200">
                    <th class="p-4">Ruangan</th>
                    <th class="p-4">Peminjam</th>
                    <th class="p-4">Kegiatan</th>
                    <th class="p-4">Waktu & Tanggal</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-600">
                @forelse($bookings as $b)
                    <tr>
                        <td class="p-4 font-semibold text-slate-800">{{ $b->ruangan->nama_ruangan ?? 'Ruangan Dihapus' }}</td>
                        <td class="p-4">{{ $b->user->name ?? 'Anonim' }}</td>
                        <td class="p-4">{{ $b->nama_acara }}</td>
                        <td class="p-4">
                            <span class="block font-medium">{{ $b->tanggal_pinjam }}</span>
                            <span class="text-xs text-slate-400">{{ $b->jam_mulai }} - {{ $b->jam_selesai }}</span>
                        </td>
                        <td class="p-4">
                            @if($b->status == 'dibooking')
                                <span class="px-2.5 py-1 text-xs font-medium bg-amber-100 text-amber-800 rounded-full">Di-Booking</span>
                            @else
                                <span class="px-2.5 py-1 text-xs font-medium bg-emerald-100 text-emerald-800 rounded-full">Selesai</span>
                            @endif
                        </td>
                        <td class="p-4">
                            @if($b->user_id == Auth::id())
                                <form action="{{ route('booking.destroy', $b->_id) }}" method="POST" onsubmit="return confirm('Batalkan booking ruangan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:underline cursor-pointer">Batalkan</button>
                                </form>
                            @else
                                <span class="text-xs text-slate-400">No Action</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-slate-400">Tidak ada data booking dengan status ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
