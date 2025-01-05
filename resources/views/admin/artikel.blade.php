<x-sidebar-layout>
    <!-- Button Tambah Artikel -->
    <div class="mb-6 mt-6 flex">
        <a href="{{ route('addartikel') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 ml-auto">
            Tambah Artikel
        </a>
    </div>

    <!-- Daftar Artikel Section -->
    <section class="bg-white p-8 rounded shadow">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Daftar Artikel</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Judul</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Cover</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">File</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Deskripsi</th>
                        <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikels as $artikel)
                        <tr>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $artikel->judul }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <img src="{{ asset('assets/uploads/article_cover/'.$artikel->cover_article) }}"
                                    alt="Cover Artikel" class="w-20 h-20 rounded-lg object-cover shadow">
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <a href="{{ asset($artikel->path_article . $artikel->article) }}" target="_blank"
                                    class="text-blue-600 hover:underline">Lihat File</a>
                            </td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $artikel->deskripsi }}</td>
                            <td class="border border-gray-300 p-3 text-sm text-gray-800">
                                <div class="flex items-center space-x-3">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('artikel.edit', $artikel->id_article) }}"
                                        class="flex items-center text-yellow-600 hover:underline">
                                        <img class="w-5 h-5 mr-2" src="{{ asset('assets/icon/Edit.png') }}" alt="Edit Icon">
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('artikel.delete', $artikel->id_article) }}" method="POST"
                                        style="display:inline-block;" id="delete-form-{{ $artikel->id_article }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="flex items-center text-red-600 hover:underline"
                                            onclick="confirmDelete('{{ $artikel->id_article }}')">
                                            <img class="w-5 h-5 mr-2" src="{{ asset('assets/icon/Delete.png') }}"
                                                alt="Delete Icon">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border border-gray-300 p-3 text-center text-gray-500">Belum ada artikel
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/admin.js') }}">
        var successMessage = "{{ session('success') ?? '' }}";
    </script>
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