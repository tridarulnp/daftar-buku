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

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4">No.</th>
                            <th class="p-4">Judul Buku</th>
                            <th class="p-4">Penulis</th>
                            <th class="p-4">Tahun</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($bukus as $buku)
                            <tr class="border-b">
                                <td class="p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4 font-medium">
                                    <a href="{{ route('buku.show', $buku) }}" 
                                    class="text-indigo-700 hover:underline"> 
                                     {{ $buku->judul }} 
                                    </a> 
                                </td>
                                <td class="p-4">
                                    {{ $buku->penulis }}
                                </td>
                                <td class="p-4">
                                    {{ $buku->tahun_terbit }}
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-2">
                                        <a href="{{ route('buku.edit', $buku) }}"
                                           class="text-blue-600">
                                            Edit
                                        </a>

                                        <form action="{{ route('buku.destroy', $buku) }}"
                                              method="POST"
                                              onsubmit="return confirm('Hapus buku ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="text-red-600">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"
                                    class="text-center p-8 text-gray-500">
                                    Belum ada data buku.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $bukus->links() }}
            </div>

        </div>
    </div>

</body>
</html>
