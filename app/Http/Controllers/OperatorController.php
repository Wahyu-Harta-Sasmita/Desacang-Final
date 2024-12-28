<?php

namespace App\Http\Controllers;
use App\Models\Penduduk;
use App\Models\Keluarga;
use App\Models\Bantuan;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function datapenduduk()
    {
        // Ambil data penduduk dengan paginasi
        $penduduk = Penduduk::with(['keluarga'])->get();
        return view('admin.datapenduduk', compact('penduduk'));
    }

    public function validasidata()
    {
        return view('admin.validasidata');
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
        return view('admin.formadd'); // Sesuaikan dengan lokasi file Blade Anda
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // Validasi input
        $validated = $request->validate([
            // Data untuk tabel keluargas
            'no_kk' => 'required|string|size:16|unique:keluargas,no_kk',
            'kepala_keluarga' => 'nullable|string|max:50',
            'jumlah_keluarga' => 'required|integer|min:1',

            // Data untuk tabel penduduks
            'nama' => 'required|string|max:50',
            'nik' => 'required|string|size:16|unique:penduduks,nik',
            'pekerjaan' => 'nullable|string|max:50',
            'gaji' => 'nullable|integer|min:0',
            'alamat' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:50',
            'banjar' => 'nullable|string|max:50',
            'no_rumah' => 'nullable|string|max:50',
            'kategori' => 'nullable|string|max:50',
            'geolocation' => 'nullable|string',

            // Data untuk tabel bantuans
            'jenis_bantuan' => 'required|string|max:10',
            'foto_rumah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan data ke tabel keluargas
        $keluarga = Keluarga::create([
            'no_kk' => $validated['no_kk'],
            'kepala_keluarga' => $validated['kepala_keluarga'],
            'jumlah_keluarga' => $validated['jumlah_keluarga'],
        ]);

        // Simpan data ke tabel penduduks
        $penduduk = Penduduk::create([
            'nama' => $validated['nama'],
            'nik' => $validated['nik'],
            'pekerjaan' => $validated['pekerjaan'],
            'gaji' => $validated['gaji'],
            'alamat' => $validated['alamat'],
            'desa' => $validated['desa'],
            'banjar' => $validated['banjar'],
            'no_rumah' => $validated['no_rumah'],
            'kategori' => $validated['kategori'],
            'geolocation' => $validated['geolocation'],
        ]);

        // Upload file dan simpan ke tabel bantuans
        $pathRumah = $request->file('foto_rumah')
            ? $request->file('foto_rumah')->store('assets/uploads/rumah', 'public')
            : null;

        $pathKK = $request->file('foto_kk')
            ? $request->file('foto_kk')->store('assets/uploads/kk', 'public')
            : null;

        $bantuan = Bantuan::create([
            'id_keluarga' => $keluarga->id_keluarga,
            'jenis_bantuan' => $validated['jenis_bantuan'],
            'rumah' => $pathRumah,
            'kk' => $pathKK,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('datapenduduk')->with('success', 'Data berhasil disimpan ke semua tabel.');

    } catch (\Exception $e) {
        // Tangani error saat menyimpan data
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
       
    }
}
