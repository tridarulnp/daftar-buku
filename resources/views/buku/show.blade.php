@extends('layouts.app')

@section('judul', 'Detail Buku')

@section('konten')
    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Detail Buku</h1>

        <div class="space-y-4">
            <div>
                <p class="text-sm text-gray-500">Judul Buku</p>
                <p class="font-semibold">{{ $buku->judul }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Penulis</p>
                <p class="font-semibold">{{ $buku->penulis }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Tahun Terbit</p>
                <p class="font-semibold">{{ $buku->tahun_terbit }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Sinopsis</p>
                <p>{{ $buku->sinopsis ?? 'Tidak ada sinopsis.' }}</p>
            </div>
        </div>

        <a href="{{ route('buku.index') }}"
           class="inline-block mt-6 bg-gray-600 text-white px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>
@endsection