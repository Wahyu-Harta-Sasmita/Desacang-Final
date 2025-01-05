<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Bantuan;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
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

    public function create()
    {
        $bantuans = Bantuan::all();
        return view('pages.addForm', compact('bantuans'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:50',
                'nik' => 'required|string|size:16|unique:penduduks,nik',
                'no_kk' => 'required|string|size:16',
                'kepala_keluarga' => 'nullable|string|max:50',
                'jumlah_keluarga' => 'required|integer|min:1',
                'pekerjaan' => 'nullable|string|max:50',
                'gaji' => 'nullable|integer|min:0',
                'alamat' => 'nullable|string|max:255',
                'desa' => 'nullable|string|max:50',
                'banjar' => 'nullable|string|max:50',
                'no_rumah' => 'nullable|string|max:50',
                'kategori' => 'nullable|string|max:50',
                'geolocation' => 'nullable|string|max:255',
                'rumah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'jenis_bantuan' => 'required|string|max:50',
            ]);

            $pathRumah = $request->file('rumah')
                ? $request->file('rumah')->move(public_path('assets/uploads/rumah'), time() . '_' . $request->file('rumah')->getClientOriginalName())
                : null;

            $pathKK = $request->file('kk')
                ? $request->file('kk')->move(public_path('assets/uploads/kk'), time() . '_' . $request->file('kk')->getClientOriginalName())
                : null;
            $bantuan = Bantuan::create([
                'jenis_bantuan' => $validated['jenis_bantuan'],
            ]);

            $penduduk = Penduduk::create([
                'user_id' => auth()->id() ?? null, 
                'nama' => $validated['nama'],
                'nik' => $validated['nik'],
                'no_kk' => $validated['no_kk'],
                'kepala_keluarga' => $validated['kepala_keluarga'] ?? null,
                'jumlah_keluarga' => $validated['jumlah_keluarga'],
                'pekerjaan' => $validated['pekerjaan'] ?? null,
                'gaji' => $validated['gaji'] ?? 0,
                'alamat' => $validated['alamat'] ?? null,
                'desa' => $validated['desa'] ?? null,
                'banjar' => $validated['banjar'] ?? null,
                'no_rumah' => $validated['no_rumah'] ?? null,
                'kategori' => $validated['kategori'] ?? null,
                'geolocation' => $validated['geolocation'] ?? null,
                'path_rumah' => $pathRumah,
                'rumah' => $pathRumah ? basename($pathRumah) : null,
                'path_kk' => $pathKK,
                'kk' => $pathKK ? basename($pathKK) : null,
                'bantuan_id' => $bantuan->id_bantuan,
            ]);

            return redirect()->route('profiles')->with('success', 'Data berhasil disimpan ke semua tabel.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
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
