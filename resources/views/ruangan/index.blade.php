<!-- resources/views/ruangan/index.blade.php -->
@extends('layout')

@section('content')

<h1 class="text-2xl font-bold mb-4">Data Ruangan</h1>

<a href="/ruangan/create" class="bg-blue-500 text-white px-3 py-1">+ Tambah</a>

<div class="my-3 space-x-2">
    <a href="/ruangan" class="bg-gray-500 text-white px-2">Semua</a>
    <a href="/ruangan?status=tersedia" class="bg-green-500 text-white px-2">Tersedia</a>
    <a href="/ruangan?status=dibooking" class="bg-red-500 text-white px-2">Dibooking</a>
</div>

<table class="w-full bg-white shadow mt-3">
<tr class="bg-gray-200">
    <th>Kode</th>
    <th>Nama</th>
    <th>Kapasitas</th>
    <th>Lokasi</th>
    <th>Status</th>
</tr>

@foreach($ruangans as $r)
<tr class="border">
    <td>{{ $r->kode_ruangan }}</td>
    <td>{{ $r->nama_ruangan }}</td>
    <td>{{ $r->kapasitas }}</td>
    <td>{{ $r->lokasi }}</td>
    <td>
        <span class="px-2 text-white {{ $r->status=='tersedia'?'bg-green-500':'bg-red-500' }}">
            {{ $r->status }}
        </span>
    </td>
</tr>
@endforeach

</table>

@endsection
