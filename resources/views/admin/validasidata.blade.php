<x-sidebar-layout>
    <!-- Data Penduduk Lengkap -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Validasi Data Penduduk</h2>

            <!-- Filters -->
            <form method="GET" action="{{ route('validasidata') }}" class="flex gap-4">
                <input type="hidden" name="page_type" value="validasidata">
                <div class="flex gap-4">
                    <button type="submit" name="validated" value="1"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Data yang Tervalidasi
                    </button>
                    <button type="submit" name="validated" value="0"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Data yang Belum Tervalidasi
                    </button>
                </div>

                <!-- Pencarian Nama -->
                <div class="w-64">
                    <input type="text" name="search" placeholder="Cari Nama..." value="{{ request('search') }}"
                        class="p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <!-- Filter Desa -->
                <div>
                    <select name="desa_filter"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
                        <option value="">Filter Desa</option>
                        <option value="Desa Bungkulan" {{ request('desa_filter') == 'Desa Bungkulan' ? 'selected' : '' }}>
                            Desa
                            Bungkulan</option>
                        <option value="Desa Temukus" {{ request('desa_filter') == 'Desa Temukus' ? 'selected' : '' }}>Desa
                            Temukus
                        </option>
                    </select>
                </div>

                <!-- Tombol Cari -->
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Cari</button>
            </form>

        </div>

        <!-- Tabel Data Penduduk -->
        <div class="bg-white">
            <div class="overflow-x-auto">
                @if ($validasi->isEmpty())
                    <!-- Pesan Jika Tidak Ada Data -->
                    <div class="p-6 text-center text-gray-500">
                        <p>Tidak ada data yang tersedia.</p>
                    </div>
                @else
                        <table class="w-full border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Nama Kepala
                                        Keluarga</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">NIK</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">No KK</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Pekerjaan</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Jumlah Anggota
                                        Keluarga</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Alamat</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Gaji</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Koordinat
                                        Geolocation</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Jenis Bantuan</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Desa</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Banjar</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Foto Rumah</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Foto KK</th>
                                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($validasi as $penduduk)
                                    <tr>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                            {{ $penduduk->kepala_keluarga }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $penduduk->nik }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $penduduk->no_kk }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $penduduk->pekerjaan }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                            {{ $penduduk->jumlah_keluarga }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $penduduk->alamat }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                            {{ number_format($penduduk->gaji, 0, ',', '.') }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $penduduk->geolocation }}
                                        </td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                            {{ $penduduk->bantuan?->jenis_bantuan ?? '-' }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $penduduk->desa }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $penduduk->banjar }}</td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                            <a href="{{ asset('assets/uploads/rumah'. $penduduk->rumah) }}" download
                                                class="text-blue-600 hover:underline">Unduh Dokumen</a>
                                        </td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                            <a href="{{ asset('assets/uploads/kk'. $penduduk->kk) }}" download
                                                class="text-blue-600 hover:underline">Unduh Dokumen</a>
                                        </td>
                                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                            @if ($penduduk->validasi?->status === 'validated')
                                                <span class="text-green-600">Selesai</span>
                                            @else
                                                <form method="POST" action="{{ route('validate', ['user_id' => $penduduk->user_id]) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-blue-600 hover:underline">Validasi</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-4 flex justify-center">
                            {{ $validasi->links() }}
                        </div>
                    </div>
                @endif
        </div>
    </div>
</x-sidebar-layout>