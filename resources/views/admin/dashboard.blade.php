<x-sidebar-layout>
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Total Penduduk</h2>
            <p class="text-3xl font-bold text-gray-800">{{ number_format($totalPenduduk) }}</p>
            <p class="text-sm text-gray-500">Data terkini</p>
        </div>

        <!-- Card: Data Belum Validasi -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Data Belum Validasi</h2>
            <p class="text-3xl font-bold text-gray-800">56</p>
            <p class="text-sm text-gray-500">Menunggu validasi</p>
        </div>

        <!-- Card: Kategori Penduduk -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Kategori Penduduk</h2>
            <ul class="text-sm text-gray-600 space-y-1">
                @foreach ($kategoriPenduduk as $kategori => $jumlah)
                    <li>{{ $kategori }}: {{ number_format($jumlah) }}</li>
                @endforeach
            </ul>
        </div>

    </div>

    <!-- Data Penduduk Tervalidasi -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Riwayat Data Penduduk Tervalidasi </h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Nama</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Kategori</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Made Aditya</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Krama Desa Adat</td>
                        <td class="border border-gray-300 p-3 text-sm text-green-600">Tervalidasi</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Ni Luh Ayu</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Krama Tamiu</td>
                        <td class="border border-gray-300 p-3 text-sm text-green-600">Tervalidasi</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Putu Widi</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Tamiu</td>
                        <td class="border border-gray-300 p-3 text-sm text-green-600">Tervalidasi</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-right mt-2">
            <p class="text-blue-500 hover:underline cursor-pointer">Selengkapnya</p>
        </div>
    </div>

    <!-- Data Penduduk Belum Tervalidasi -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Permintaan Validasi Terbaru</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Nama</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Kategori</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">I Gusti Rai</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Krama Desa Adat</td>
                        <td class="border border-gray-300 p-3 text-sm text-yellow-600">Belum Tervalidasi</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Kadek Artha</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Krama Tamiu</td>
                        <td class="border border-gray-300 p-3 text-sm text-yellow-600">Belum Tervalidasi</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Komang Devi</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Tamiu</td>
                        <td class="border border-gray-300 p-3 text-sm text-yellow-600">Belum Tervalidasi</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-right mt-2">
            <p class="text-blue-500 hover:underline cursor-pointer">Selengkapnya</p>
        </div>
    </div>
</x-sidebar-layout>