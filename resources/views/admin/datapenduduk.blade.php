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
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <a href="{{ route('detailpenduduk', $p->id_penduduk) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $p->nama }}
                                </a>
                            </td>
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
                                <div class="flex items-center space-x-3">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('datapenduduk.edit', $p->id_penduduk) }}">
                                        <img class="w-6 h-6" src="{{ asset('assets/icon/Edit.png') }}" alt="Edit Icon">
                                    </a>

                                    <!-- Form Hapus -->
                                    <form action="{{ route('datapenduduk.destroy', $p->id_penduduk) }}" method="POST"
                                        id="delete-form-{{ $p->id_penduduk }}" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('{{ $p->id_penduduk }}')">
                                            <img class="w-6 h-6" src="{{ asset('assets/icon/Delete.png') }}"
                                                alt="Delete Icon">
                                        </button>
                                    </form>
                                </div>
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
            <div class="mt-4 flex justify-center">
                {{ $penduduk->links() }}
            </div>
            <a href="{{ route('formadd') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah
                Data</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            const form = document.getElementById(`delete-form-${id}`);

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data ini akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        }
    </script>

</x-sidebar-layout>