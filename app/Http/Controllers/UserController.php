<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Bantuan;
use App\Models\Notifikasi;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    
    public function index()
    {

        $user = User::find(Auth::id());
        $penduduk = Penduduk::where('id_penduduk', $user->id)->first();

        $articles = Article::latest()->take(6)->get();
        if ($user->level=='user') {
        return Inertia::render('Home', [
            'articles' => $articles
        ]);
        } else {
            return view('admin.dashboard', compact('totalPenduduk', 'kategoriPenduduk', 'totalbelumValidasi', 'belumValidasi', 'tervalidasi')); 
        }
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

    public function getNotifications($pendudukId)
    {
        // Ambil semua notifikasi untuk penduduk dengan ID yang diberikan
        $notifications = Notifikasi::where('penduduk_id', $pendudukId)->get();

        // Kembalikan respons dengan data notifikasi
        return response()->json($notifications);
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

        // Upload files if available
        $pathRumah = $request->file('rumah')
            ? $request->file('rumah')->move(public_path('assets/uploads/rumah'), time() . '_' . $request->file('rumah')->getClientOriginalName())
            : null;

        $pathKK = $request->file('kk')
            ? $request->file('kk')->move(public_path('assets/uploads/kk'), time() . '_' . $request->file('kk')->getClientOriginalName())
            : null;

        // Create the data with pending status
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
            'status_validasi' => 'pending', // Status is set to pending
        ]);

        return redirect()->route('profiles')->with('success', 'Data berhasil diajukan untuk validasi admin.');
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
        $penduduk = Penduduk::findOrFail($id);

        return view('pages.editForm', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'nama' => 'required|string|max:50',
                'nik' => 'required|string|size:16|unique:penduduks,nik,' . $id . ',id_penduduk',
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

            // Temukan data penduduk berdasarkan ID
            $penduduk = Penduduk::findOrFail($id);

            // Tangani file jika diunggah, jika tidak, pertahankan nilai lama
            if ($request->file('rumah')) {
                $pathRumah = $request->file('rumah')->store('assets/uploads/rumah', 'public');
                $validated['path_rumah'] = $pathRumah;
                $validated['rumah'] = basename($pathRumah);
            } else {
                $validated['path_rumah'] = $penduduk->path_rumah;
                $validated['rumah'] = $penduduk->rumah;
            }

            if ($request->file('kk')) {
                $pathKK = $request->file('kk')->store('assets/uploads/kk', 'public');
                $validated['path_kk'] = $pathKK;
                $validated['kk'] = basename($pathKK);
            } else {
                $validated['path_kk'] = $penduduk->path_kk;
                $validated['kk'] = $penduduk->kk;
            }

            // Update data di tabel bantuans
            if ($penduduk->bantuan_id) {
                $bantuan = Bantuan::find($penduduk->bantuan_id);
                if ($bantuan) {
                    $bantuan->update([
                        'jenis_bantuan' => $validated['jenis_bantuan'],
                    ]);
                }
            }

            // Update data di tabel penduduks
            $penduduk->update([
                'nama' => $validated['nama'],
                'nik' => $validated['nik'],
                'no_kk' => $validated['no_kk'],
                'kepala_keluarga' => $validated['kepala_keluarga'] ?? $penduduk->kepala_keluarga,
                'jumlah_keluarga' => $validated['jumlah_keluarga'],
                'pekerjaan' => $validated['pekerjaan'] ?? $penduduk->pekerjaan,
                'gaji' => $validated['gaji'] ?? $penduduk->gaji,
                'alamat' => $validated['alamat'] ?? $penduduk->alamat,
                'desa' => $validated['desa'] ?? $penduduk->desa,
                'banjar' => $validated['banjar'] ?? $penduduk->banjar,
                'no_rumah' => $validated['no_rumah'] ?? $penduduk->no_rumah,
                'kategori' => $validated['kategori'] ?? $penduduk->kategori,
                'geolocation' => $validated['geolocation'] ?? $penduduk->geolocation,
                'path_rumah' => $validated['path_rumah'],
                'rumah' => $validated['rumah'],
                'path_kk' => $validated['path_kk'],
                'kk' => $validated['kk'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('profiles')->with('success', 'Data berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
