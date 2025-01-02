<x-sidebar-layout>
    <!-- Form Edit Artikel -->
    <div class="bg-white p-8 rounded shadow w-full mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-6 text-gray-700 text-center">Form Edit Artikel</h2>
        <form action="{{ route('artikel.update', $artikel->id_article) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <!-- Input Judul -->
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                    <input type="text" id="judul" name="judul"
                        class="mt-1 block w-full border border-gray-300 rounded p-3 text-gray-700"
                        placeholder="Masukkan judul artikel"
                        value="{{ old('judul', $artikel->judul) }}" required>
                </div>
                <!-- Upload Cover -->
                <div>
                    <label for="cover_article" class="block text-sm font-medium text-gray-700">Unggah Cover Artikel</label>
                    <input type="file" id="cover_article" name="cover_article" accept=".jpg,.jpeg,.png"
                        class="mt-1 block w-full border border-gray-300 rounded p-3 text-gray-700">
                    @if($artikel->cover_article)
                        <p class="text-sm text-gray-500 mt-2">Cover saat ini: 
                            <img src="{{ asset('assets/uploads/artikel_cover/' . $artikel->cover_article) }}" alt="Cover" class="w-24 h-24 mt-2">
                        </p>
                    @endif
                </div>
                <!-- Upload Artikel -->
                <div>
                    <label for="article" class="block text-sm font-medium text-gray-700">Unggah File Artikel</label>
                    <input type="file" id="article" name="article" accept=".doc,.docx,.pdf"
                        class="mt-1 block w-full border border-gray-300 rounded p-3 text-gray-700">
                    @if($artikel->article)
                        <p class="text-sm text-gray-500 mt-2">File saat ini: 
                            <a href="{{ asset('assets/uploads/artikel/' . $artikel->article) }}" target="_blank" class="text-blue-600 hover:underline">
                                {{ $artikel->article }}
                            </a>
                        </p>
                    @endif
                </div>
                <!-- Input Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Artikel</label>
                    <textarea id="deskripsi" name="deskripsi"
                        class="mt-1 block w-full border border-gray-300 rounded p-3 text-gray-700"
                        placeholder="Masukkan deskripsi artikel" required>{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
                </div>
            </div>
            <!-- Tombol -->
            <div class="text-center space-x-4">
                <a href="{{ route('admin.artikel') }}"
                    class="px-6 py-3 bg-gray-600 text-white rounded hover:bg-gray-700">Batal</a>
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        // Initialize CKEditor on the textarea with ID 'deskripsi'
        CKEDITOR.replace('deskripsi');
    </script>
</x-sidebar-layout>
