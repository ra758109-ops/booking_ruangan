<!-- resources/views/ruangan/create.blade.php -->
@extends('layout')

@section('content')

<h1 class="text-xl font-bold mb-4">Tambah Ruangan</h1>

<form action="/ruangan" method="POST" class="bg-white p-4 shadow">
@csrf

<input name="kode_ruangan" placeholder="Kode" class="w-full border p-2 mb-2">

<input name="nama_ruangan" placeholder="Nama" class="w-full border p-2 mb-2">

<input name="kapasitas" placeholder="Kapasitas" class="w-full border p-2 mb-2">

<input name="lokasi" placeholder="Lokasi" class="w-full border p-2 mb-2">

<button class="bg-blue-500 text-white px-4 py-2">Simpan</button>

</form>

@endsection
