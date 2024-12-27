<x-sidebar-layout>
    <!-- Detail Penduduk -->
    <div class="bg-white p-6 rounded shadow mb-6 relative">
        <!-- Tombol Kembali -->
        <a href="{{ route('datapenduduk') }}"
            class="absolute top-6 right-6 px-4 py-2 bg-gray-600 text-white text-lg font-medium rounded hover:bg-gray-700">
            Kembali
        </a>
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Detail Data Penduduk</h2>
        <div class="flex flex-col lg:flex-row lg:items-start lg:space-x-8">

            <!-- Foto Penduduk -->
            <div class="flex-shrink-0">
                <img src="https://via.placeholder.com/200" alt="Foto Penduduk" class="w-56 h-56 rounded-lg shadow">
            </div>

            <!-- Informasi Penduduk -->
            <div class="flex-1">
                <h3 class="text-2xl font-semibold text-gray-700 mb-6">Informasi Lengkap</h3>
                <table class="w-full text-lg text-left text-gray-700">
                    <tbody>
                        <tr>
                            <td class="py-3 font-medium w-1/3">Nama Kepala Keluarga:</td>
                            <td class="py-3">I Gusti Rai</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">NIK:</td>
                            <td class="py-3">1234567890123456</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">No KK:</td>
                            <td class="py-3">9876543210987654</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">Pekerjaan:</td>
                            <td class="py-3">Petani</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">Jumlah Anggota Keluarga:</td>
                            <td class="py-3">5</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">Alamat:</td>
                            <td class="py-3">Jl. Melati No. 10</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">Koordinat Geolocation:</td>
                            <td class="py-3">-8.3405, 115.0920</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">Jenis Bantuan:</td>
                            <td class="py-3">PKH, KIS</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">Desa:</td>
                            <td class="py-3">Desa Melati</td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium w-1/3">Banjar:</td>
                            <td class="py-3">Banjar Melati</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Foto Dokumen -->
    <div class="bg-white p-6 rounded shadow">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Foto Rumah -->
            <div>
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Foto Rumah:</h4>
                <img src="https://via.placeholder.com/200" alt="Foto Rumah"
                    class="w-full h-56 rounded-lg object-cover shadow">
            </div>
            <!-- Foto KK -->
            <div>
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Foto KK:</h4>
                <img src="https://via.placeholder.com/200" alt="Foto KK"
                    class="w-full h-56 rounded-lg object-cover shadow">
            </div>
        </div>
    </div>
</x-sidebar-layout>
