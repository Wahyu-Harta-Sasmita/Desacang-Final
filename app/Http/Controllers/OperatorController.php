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
        return view('admin.dashboard');
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


    public function validate($userId)
    {
        $penduduk = Penduduk::where('user_id', $userId)->firstOrFail();

        Validasi::updateOrCreate(
            ['user_id' => $penduduk->user_id], // Gunakan user_id untuk identifikasi
            [
                'status' => 'validated',
                'validate_at' => now(),
            ]
        );

        return redirect()->back()->with('success', 'Data berhasil divalidasi.');
    }

    public function artikel()
    {
        return view('admin.artikel');
    }

    public function editdata()
    {
        return view('admin.formedit');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }


    public function detailpenduduk()
    {
        return view('admin.pendudukdetail');
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

            // Upload file jika ada
            $pathRumah = $request->file('rumah')
                ? $request->file('rumah')->store('assets/uploads/rumah', 'public')
                : null;

            $pathKK = $request->file('kk')
                ? $request->file('kk')->store('assets/uploads/kk', 'public')
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
    public function destroy($id_penduduk)
    {
        $penduduk = Penduduk::where('id_penduduk', $id_penduduk)->first();

        if ($penduduk) {
            // Debug untuk memeriksa relasi
            dd($penduduk->keluarga, $penduduk->keluarga->bantuans);

            // Hapus data terkait
            if ($penduduk->keluarga) {
                foreach ($penduduk->keluarga->bantuans as $bantuan) {
                    $bantuan->delete();
                }
                $penduduk->keluarga->delete();
            }

            $penduduk->delete();
            return redirect()->route('datapenduduk')->with('success', 'Data penduduk beserta data terkait berhasil dihapus.');
        }

        return redirect()->route('datapenduduk')->with('error', 'Data penduduk tidak ditemukan.');
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
