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
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Cover</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">File</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikels as $artikel)
                        <tr>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $artikel->judul }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                @if($artikel->cover_article)
                                    <img src="{{ asset('assets/uploads/artikel_cover' . $artikel->cover_article) }}" alt="Cover Artikel"
                                        class="w-24 h-24 object-cover">
                                @else
                                    <span class="text-gray-500">Tidak ada cover</span>
                                @endif
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <a href="{{ asset('assets/uploads/artikel' . $artikel->article) }}" target="_blank"
                                    class="text-blue-600 hover:underline">Lihat File</a>
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800"> 
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border border-gray-300 p-3 text-center text-gray-500">Belum ada artikel
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Form Tambah Artikel dengan Overlay -->
    <div id="formOverlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow w-full max-w-lg">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Form Tambah Artikel</h2>
            <form action="{{ route('artikel.add') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <!-- Input Judul -->
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                    <input type="text" id="judul" name="judul"
                        class="mt-1 block w-full border border-gray-300 rounded p-2 text-gray-700"
                        placeholder="Masukkan judul artikel" required>
                </div>
                <!-- Upload File Cover -->
                <div>
                    <label for="cover_article" class="block text-sm font-medium text-gray-700">Unggah Cover
                        Artikel</label>
                    <input type="file" id="cover_article" name="cover_article" accept=".jpg,.jpeg,.png"
                        class="mt-1 block w-full border border-gray-300 rounded p-2 text-gray-700">
                </div>
                <!-- Upload File Artikel -->
                <div>
                    <label for="article" class="block text-sm font-medium text-gray-700">Unggah File Artikel</label>
                    <input type="file" id="article" name="article" accept=".doc,.docx,.pdf"
                        class="mt-1 block w-full border border-gray-300 rounded p-2 text-gray-700" required>
                </div>
                <!-- Tombol -->
                <div class="text-right">
                    <button type="button" onclick="toggleForm()"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Tutup</button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>


    <!-- JavaScript -->
    <script src="{{asset('assets/js/admin.js')}}">
         var successMessage = "{{ session('success') ?? '' }}";
    </script>
</x-sidebar-layout>