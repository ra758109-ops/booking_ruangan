@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <h1 class="text-2xl font-bold text-slate-800">Form Pengajuan Booking</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
        <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Pilih Ruangan Kampus</label>
                <select name="ruangan_id" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-200 outline-none">
                    <option value="" disabled selected>-- Pilih Ruangan --</option>
                    @foreach($ruangans as $r)
                        <option value="{{ $r->_id }}">
                            {{ $r->kode_ruangan ?? '' }} - {{ $r->nama_ruangan }} (Kapasitas: {{ $r->kapasitas }} Orang)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal_pinjam" required class="w-full px-4 py-2 border rounded-lg outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Jam Mulai</label>
                    <input type="time" name="jam_mulai" required class="w-full px-4 py-2 border rounded-lg outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Jam Selesai</label>
                    <input type="time" name="jam_selesai" required class="w-full px-4 py-2 border rounded-lg outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Kegiatan</label>
                <input type="text" name="nama_acara" placeholder="Ex: Seminar Teknologi" required class="w-full px-4 py-2 border rounded-lg outline-none">
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
                <a href="/booking" class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-lg text-sm font-medium">Batal</a>
                <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow text-sm font-medium">Ajukan Pinjaman</button>
            </div>
        </form>
    </div>
</div>
@endsection
