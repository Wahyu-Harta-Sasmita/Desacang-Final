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
        // Validasi input
        $request->validate([
            'judul' => 'required|max:255',
            'article' => 'required|file|mimes:doc,docx,pdf|max:2048',
            'cover_article' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'required|max:255',
        ]);

        $articleFile = $request->file('article');
        $articleName = time() . '_' . $articleFile->getClientOriginalName();
        $articleFile->move(public_path('assets/uploads/article'), $articleName);

        $coverName = null;
        if ($request->hasFile('cover_article')) {
            $coverFile = $request->file('cover_article');
            $coverName = time() . '_' . $coverFile->getClientOriginalName();
            $coverFile->move(public_path('assets/uploads/article_cover'), $coverName);
        }

        Article::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'cover_article' => $coverName, 
            'article' => $articleName,
            'deskripsi' => $request->deskripsi,
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
    public function edit($id)
    {
        $artikel = Article::findOrFail($id);
        return view('admin.editartikel', compact('artikel'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'cover_article' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'article' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $artikel = Article::findOrFail($id);

        // Update file jika diunggah
        if ($request->hasFile('cover_article')) {
            $coverPath = $request->file('cover_article')->store('assets/uploads/article_cover', 'public');
            $artikel->cover_article = basename($coverPath);
        }

        if ($request->hasFile('article')) {
            $filePath = $request->file('article')->store('assets/uploads/article', 'public');
            $artikel->article = basename($filePath);
        }

        // Update data lainnya
        $artikel->judul = $validated['judul'];
        $artikel->deskripsi = $validated['deskripsi'];
        $artikel->save();

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Temukan data artikel berdasarkan ID
            $artikel = Article::findOrFail($id);

            // Hapus file cover jika ada
            if ($artikel->cover_article) {
                $coverPath = public_path('assets/uploads/article_cover/' . $artikel->cover_article);
                if (file_exists($coverPath)) {
                    unlink($coverPath); // Hapus file cover
                }
            }

            // Hapus file artikel jika ada
            if ($artikel->article) {
                $filePath = public_path('assets/uploads/article/' . $artikel->article);
                if (file_exists($filePath)) {
                    unlink($filePath); // Hapus file artikel
                }
            }

            // Hapus data artikel dari database
            $artikel->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah
            return redirect()->route('admin.artikel')->with('error', 'Terjadi kesalahan saat menghapus artikel: ' . $e->getMessage());
        }
    }
}
