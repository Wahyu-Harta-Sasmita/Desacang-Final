<x-sidebar-layout>
    <!-- Data Penduduk Lengkap -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <!-- Header Data Penduduk -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Data Penduduk</h2>
            <div class="flex gap-4">
                <div class="w-64">
                    <input type="text" placeholder="Cari Nama..."
                        class="p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <select
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
                        <option value="">Filter Desa</option>
                        <option value="Desa Melati">Desa Bungkulan</option>
                        <option value="Desa Mawar">Desa Temukus</option>
                    </select>
                </div>
            </div>
        </div>

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
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                {{ $p->keluarga->kepala_keluarga ?? '-' }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->nik }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->keluarga->no_kk ?? '-' }}
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->pekerjaan }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->alamat }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->desa }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $p->banjar }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                @if ($p->keluarga && $p->keluarga->bantuans->isNotEmpty())
                                    {{ $p->keluarga->bantuans->first()->jenis_bantuan }}
                                @else
                                    Tidak Ada Bantuan
                                @endif
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <button class="text-blue-600 hover:underline">Edit</button>
                                <form action="{{ route('penduduk.destroy', $p->id_penduduk) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
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
                <button
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled>&larr; Sebelumnya</button>
                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded">1</span>
                <button class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-gray-700">Berikutnya &rarr;</button>
            </div>
            <a href="{{ route('formadd') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah
                Data</a>
        </div>

        <div class="mt-4">
            {{ $penduduk->links() }}
        </div>
    </div>
</x-sidebar-layout>