<?php

namespace App\Http\Controllers;
use App\Models\Penduduk;
use App\Models\Bantuan;
use App\Models\Validasi;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function dashboard()
    {
        $tervalidasi = Validasi::where('status', 'tervalidasi')->get();
        $totalbelumValidasi = Penduduk::where('validasi_id', 'belum_validasi')->count();
        $belumValidasi = Validasi::where('status', 'belum tervalidasi')->get();

        $kategoriPenduduk = [
            'Krama Desa Adat' => Penduduk::where('kategori', 'Krama Desa Adat')->count(),
            'Krama Tamiu' => Penduduk::where('kategori', 'Krama Tamiu')->count(),
            'Tamiu' => Penduduk::where('kategori', 'Tamiu')->count(),
        ];

        $totalPenduduk = Penduduk::count();
        return view('admin.dashboard', compact('totalPenduduk', 'kategoriPenduduk', 'totalbelumValidasi', 'belumValidasi', 'tervalidasi'));
    }

    public function datapenduduk()
    {
        $penduduk = Penduduk::with('bantuan')->paginate(4);
        return view('admin.datapenduduk', compact('penduduk'));
    }


    public function validasidata(Request $request)
    {
        $query = Penduduk::with('bantuan');

        // Filter berdasarkan nama
        if ($request->filled('search')) {
            $query->where('kepala_keluarga', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan desa
        if ($request->filled('desa_filter')) {
            $query->where('desa', $request->desa_filter);
        }

        // Filter berdasarkan status validasi
        if ($request->filled('validated')) {
            if ($request->validated == 1) {
                $query->whereHas('validasi', function ($q) {
                    $q->where('status', 'validated');
                });
            } elseif ($request->validated == 0) {
                $query->whereDoesntHave('validasi');
            }
        }

        // Ambil hasil pencarian dengan paginasi
        $validasi = $query->paginate(4)->appends($request->all());

        // Return ke view
        return view('admin.validasidata', compact('validasi'));
    }


    public function validate(Request $request, $user_id)
    {
        $penduduk = Penduduk::where('user_id', $user_id)->first();

        if (!$penduduk) {
            return redirect()->back()->with('error', 'Data penduduk tidak ditemukan.');
        }

        // Jika sudah divalidasi, tidak perlu memproses ulang
        if ($penduduk->validasi?->status === 'validated') {
            return redirect()->back()->with('info', 'Data sudah divalidasi.');
        }

        // Lakukan validasi
        $penduduk->validasi()->updateOrCreate(
            ['id_penduduk' => $penduduk->id_penduduk],
            ['status' => 'validated']
        );

        return redirect()->back()->with('success', 'Data berhasil divalidasi.');
    }


    public function artikel()
    {
        return view('admin.artikel');
    }

    public function addartikel()
    {
        return view('admin.addartikel');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }


    public function detailpenduduk($id)
    {
        $penduduk = Penduduk::with('bantuan')->findOrFail($id); // Jika ada relasi bantuan
        return view('admin.pendudukdetail', compact('penduduk'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bantuans = Bantuan::all();
        return view('admin.formadd', compact('bantuans')); // Sesuaikan dengan lokasi file Blade Anda
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
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

            // Upload file jika ada, menggunakan move
            $pathRumah = $request->file('rumah')
                ? $request->file('rumah')->move(public_path('assets/uploads/rumah'), time() . '_' . $request->file('rumah')->getClientOriginalName())
                : null;

            $pathKK = $request->file('kk')
                ? $request->file('kk')->move(public_path('assets/uploads/kk'), time() . '_' . $request->file('kk')->getClientOriginalName())
                : null;

            // Simpan data ke tabel bantuans
            $bantuan = Bantuan::create([
                'jenis_bantuan' => $validated['jenis_bantuan'],
            ]);

            // Simpan data ke tabel penduduks
            $penduduk = Penduduk::create([
                'user_id' => auth()->id() ?? null, // Jika tidak login, user_id diset null
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

            // Redirect dengan pesan sukses
            return redirect()->route('datapenduduk')->with('success', 'Data berhasil disimpan ke semua tabel.');
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
    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);

        return view('admin.formedit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
            return redirect()->route('datapenduduk')->with('success', 'Data berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari data penduduk berdasarkan ID
            $penduduk = Penduduk::findOrFail($id);

            // Hapus relasi jika ada
            // Cek dan hapus data terkait pada relasi 'bantuan'
            if ($penduduk->bantuan) {
                $penduduk->bantuan->penduduks()->where('id_penduduk', $penduduk->id_penduduk)->delete();
            }

            // Cek dan hapus data terkait pada relasi 'validasi'
            if ($penduduk->validasi) {
                $penduduk->validasi()->delete();
            }

            // Hapus data utama
            $penduduk->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('datapenduduk')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah
            return redirect()->route('datapenduduk')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }


    public function search(Request $request)
    {
        $query = Penduduk::query();

        // Filter berdasarkan nama
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan desa
        if ($request->filled('desa_filter')) {
            $query->where('desa', $request->desa_filter);
        }

        // Ambil hasil pencarian
        $penduduk = $query->paginate(4); // Menggunakan pagination

        return view('admin.datapenduduk', compact('penduduk'));
    }
}
