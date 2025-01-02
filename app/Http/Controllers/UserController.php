<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->take(6)->get();

        return Inertia::render('Home', [
            'articles' => $articles
        ]);
    }

    public function article()
    {
        $articles = Article::all();

        return Inertia::render('Articles', [
            'articles' => $articles
        ]);
    }

    public function articleDetail($id)
    {
        $article = Article::findOrFail($id);

        return Inertia::render('ArticleDetails', [
            'article' => $article
        ]);
    }

    public function notifikasi()
    {
        return inertia('Notification');
    }

    public function profiles()
    {
        $penduduk = Penduduk::with('bantuan')
        ->latest()
        ->take(1)
        ->get();
        return Inertia::render('Profiles', [
            'penduduk' => $penduduk
        ]);
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
        //
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
        //
    }
}
