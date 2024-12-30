<x-sidebar-layout>
    <!-- Data Penduduk Lengkap -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <!-- Header Data Penduduk -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Data Penduduk</h2>
            <form method="GET" action="{{ route('datapenduduk') }}" class="flex gap-4">
                <!-- Pencarian Nama -->
                <div class="w-64">
                    <input type="text" name="search" placeholder="Cari Nama..." value="{{ request('search') }}"
                        class="p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <form method="GET" action="{{ route('datapenduduk') }}" class="flex gap-4">
                    <!-- Filter Desa -->
                    <div>
                        <select name="desa_filter"
                            class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
                            <option value="">Filter Desa</option>
                            <option value="Desa Bungkulan" {{ request('desa_filter') == 'Desa Bungkulan' ? 'selected' : '' }}>Desa Bungkulan</option>
                            <option value="Desa Temukus" {{ request('desa_filter') == 'Desa Temukus' ? 'selected' : '' }}>
                                Desa Temukus</option>
                        </select>
                    </div>
                    <!-- Tombol Cari -->
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Cari</button>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Nama</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Nama Kepala Keluarga
                        </th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">NIK</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">No KK</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Pekerjaan</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Alamat</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Desa</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Banjar</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Jenis Bantuan</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penduduk as $p)
                        <tr>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->nama }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->kepala_keluarga ?? '-' }}
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->nik }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->no_kk ?? '-' }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->pekerjaan }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->alamat }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->desa }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->banjar }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                @if ($p->bantuan)
                                    {{ $p->bantuan->jenis_bantuan }}
                                @else
                                    Tidak Ada Bantuan
                                @endif
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <!-- Tombol Edit -->
                                <a href="#" class="text-yellow-600 hover:underline">Edit</a>
                                <!-- Form Hapus -->
                                <form action="#">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="border border-gray-300 p-3 text-sm text-gray-800 text-center">Tidak ada
                                data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex justify-between items-center mt-6">
            <div class="flex items-center space-x-1">
                {{ $penduduk->links() }}
            </div>
            <a href="{{ route('formadd') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah
                Data</a>
        </div>
    </div>
</x-sidebar-layout>