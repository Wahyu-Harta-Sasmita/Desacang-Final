<x-sidebar-layout>
    <!-- Button Tambah Artikel -->
    <div class="mb-4 flex">
        <button onclick="toggleForm()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 ml-auto">
            Tambah Artikel
        </button>
    </div>

    <!-- Daftar Artikel Section -->
    <section class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Daftar Artikel</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Judul</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Tanggal</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Foto</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Konten</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Panduan Pengelolaan Sampah Desa</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">26 Desember 2024</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                            <img src="https://via.placeholder.com/100" alt="Foto Sampah Desa" class="w-24 h-24 object-cover">
                        </td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">Panduan lengkap untuk mengelola sampah secara efektif di desa...</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">
                            <button class="text-blue-600 hover:underline mr-2">Edit</button>
                            <button class="text-red-600 hover:underline mr-2">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Form Tambah Artikel dengan Overlay -->
    <div id="formOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow w-full max-w-lg">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Form Tambah Artikel</h2>
            <form action="#" method="post" enctype="multipart/form-data" class="space-y-4">
                <!-- Input Judul -->
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                    <input type="text" id="judul" name="judul" class="mt-1 block w-full border border-gray-300 rounded p-2 text-gray-700" placeholder="Masukkan judul artikel">
                </div>
                <!-- Input Tanggal -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full border border-gray-300 rounded p-2 text-gray-700">
                </div>
                <!-- Input Konten -->
                <div>
                    <label for="konten" class="block text-sm font-medium text-gray-700">Konten Artikel</label>
                    <textarea id="konten" name="konten" rows="5" class="mt-1 block w-full border border-gray-300 rounded p-2 text-gray-700" placeholder="Tulis konten artikel di sini"></textarea>
                </div>
                <!-- Upload Foto -->
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700">Unggah Foto</label>
                    <input type="file" id="foto" name="foto" accept="image/*" class="mt-1 block w-full border border-gray-300 rounded p-2 text-gray-700">
                </div>
                <!-- Tombol -->
                <div class="text-right">
                    <button type="button" onclick="toggleForm()" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Tutup</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{asset('assets/js/admin.js')}}">
       
    </script>
</x-sidebar-layout>
