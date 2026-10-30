<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Mini</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Perpustakaan Mini
                </h1>
                <p class="text-gray-500 mt-2">
                    Kelola koleksi buku Anda
                </p>
            </div>

            <a href="{{ route('buku.create') }}"
               class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
                + Tambah Buku
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow p-6">

            <form action="{{ route('buku.index') }}" method="GET"
                  class="flex gap-3 mb-6">
                <input type="text" name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari judul atau penulis..."
                       class="border rounded-lg px-4 py-3 flex-1">

                <button type="submit"
                        class="bg-gray-800 text-white px-6 rounded-lg">
                    Cari
                </button>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                @forelse($bukus as $buku)

                    <div class="bg-gray-50 border rounded-xl p-5 shadow-sm">

                        <h2 class="text-xl font-bold text-gray-800 mb-3">
                            {{ $buku->judul }}
                        </h2>

                        <p class="text-gray-600 mb-2">
                            <span class="font-semibold">Penulis:</span>
                            {{ $buku->penulis }}
                        </p>

                        <p class="text-gray-600 mb-2">
                            <span class="font-semibold">Penerbit:</span>
                            {{ $buku->penerbit ?? '-' }}
                        </p>

                        <p class="text-gray-600 mb-3">
                            <span class="font-semibold">Tahun Terbit:</span>
                            {{ $buku->tahun_terbit }}
                        </p>

                        <div class="border-t pt-3 mt-3">
                            <p class="font-semibold text-gray-700 mb-1">
                                Sinopsis
                            </p>
                            <p class="text-gray-500 text-sm">
                                {{ $buku->sinopsis ?: 'Belum ada sinopsis.' }}
                            </p>
                        </div>

                        <div class="flex gap-4 mt-5">

                            <a href="{{ route('buku.edit', $buku) }}"
                               class="text-blue-600 hover:underline">
                                Edit
                            </a>

                            <form action="{{ route('buku.destroy', $buku) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus buku ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </div>

                @empty

                    <div class="col-span-full text-center p-8 text-gray-500">
                        Belum ada data buku.
                    </div>

                @endforelse

            </div>

            <div class="mt-6">
                {{ $bukus->links() }}
            </div>

        </div>
    </div>

</body>
</html>

