<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%");
        }

        $bukus = $query->latest()->paginate(10);

        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    } 

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1000|max:9999',
            'sinopsis' => 'nullable|string',
            'penerbit' => 'nullable|string|max:255',
        ]);

        Buku::create($validated);

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1000|max:9999',
            'sinopsis' => 'nullable|string',
            'penerbit' => 'nullable|string|max:255',
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil dihapus.');
    }
}
