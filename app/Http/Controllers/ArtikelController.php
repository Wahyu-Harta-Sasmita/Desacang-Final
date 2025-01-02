<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Article::all();
        return view('admin.artikel', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'article' => 'required|file|mimes:doc,docx,pdf|max:2048',
            'cover_article' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file artikel
        $articlePath = $request->file('article')->store('assets/uploads/artikel', 'public');

        // Upload cover artikel (jika ada)
        $coverPath = null;
        if ($request->hasFile('cover_article')) {
            $coverPath = $request->file('cover_article')->store('assets/uploads/artikel_cover', 'public');
        }

        // Simpan data ke database
        Article::create([
            'user_id' => auth()->id(), // ID pengguna yang sedang login
            'judul' => $request->judul,
            'cover_article' => $coverPath ?? 'assets/uploads/artikel_cover/', // Gunakan default jika tidak ada
            'path_article' => 'assets/uploads/artikel/',
            'article' => $articlePath,
        ]);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
