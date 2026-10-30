<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-2xl mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            Edit Buku
        </h1>

        <p class="text-gray-500 mb-8">
            Perbarui informasi buku Anda.
        </p>

        <div class="bg-white rounded-xl shadow p-6">

            <form action="{{ route('buku.update', $buku) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium mb-2">
                        Judul Buku
                    </label>

                    <input type="text" name="judul"
                        value="{{ old('judul', $buku->judul) }}"
                        class="w-full border rounded-lg px-4 py-2">

                    @error('judul')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-2">
                        Penulis
                    </label>

                    <input type="text" name="penulis"
                        value="{{ old('penulis', $buku->penulis) }}"
                        class="w-full border rounded-lg px-4 py-2">

                    @error('penulis')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-2">
                        Penerbit
                    </label>
                   
                    <input type="text" name="penerbit"
                        value="{{ old('penerbit', $buku->penerbit) }}"
                        class="w-full border rounded-lg px-4 py-2"
                        placeholder="Masukkan nama penerbit">

                    @error('penerbit')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-2">
                        Tahun Terbit
                    </label>

                    <input type="number" name="tahun_terbit"
                        value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                        class="w-full border rounded-lg px-4 py-2">

                    @error('tahun_terbit')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block font-medium mb-2">
                        Sinopsis
                    </label>

                    <textarea name="sinopsis" rows="4"
                        class="w-full border rounded-lg px-4 py-2">{{ old('sinopsis', $buku->sinopsis) }}</textarea>

                    @error('sinopsis')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('buku.index') }}"
                        class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</body>
</html>
