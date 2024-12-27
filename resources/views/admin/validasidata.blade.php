<x-sidebar-layout>
    <!-- Data Penduduk Lengkap -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Validasi Data Penduduk</h2>

            <!-- Filters -->
            <div class="flex gap-4 mb-4">
                <div class="flex gap-4">
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Data yang Tervalidasi
                    </button>
                    <button
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Data yang Belum Tervalidasi
                    </button>
                </div>
                <!-- Search -->
                <div class="w-64">
                    <input type="text" placeholder="Cari Nama..."
                        class="p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <!-- Filter Desa -->
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
        <div class="bg-white">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Nama Kepala
                                Keluarga
                            </th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">NIK</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">No KK</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Pekerjaan</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Jumlah Anggota
                                Keluarga
                            </th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Alamat</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Gaji</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Koordinat
                                Geolocation
                            </th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Jenis Bantuan</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Desa</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Banjar</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Foto Rumah</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Foto KK</th>
                            <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">I Gusti Rai</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">1234567890123456</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">9876543210987654</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Petani</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">5</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Jl. Melati No. 10</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">100.000.000</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">-8.3405, 115.0920</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">PKH, KIS</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Desa Melati</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Banjar Melati</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <a href="#" class="text-blue-600 hover:underline">Lihat Dokumen</a>
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <a href="#" class="text-blue-600 hover:underline">Lihat Dokumen</a>
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <button class="text-blue-600 hover:underline mr-2">Validasi</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Kadek Artha</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">9876543210123456</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">1234567890987654</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Pedagang</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">3</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Jl. Mawar No. 15</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">200.000.000</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">-8.3505, 115.1020</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">KIP, PBI</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Desa Mawar</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">Banjar Mawar</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <a href="#" class="text-blue-600 hover:underline">Lihat Dokumen</a>
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <a href="#" class="text-blue-600 hover:underline">Lihat Dokumen</a>
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <button class="text-blue-600 hover:underline mr-2">Validasi</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-sidebar-layout>