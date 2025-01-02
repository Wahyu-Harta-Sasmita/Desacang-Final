<x-sidebar-layout>
    <!-- Tampilkan Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan Pesan Kesalahan -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <!-- Form Tambah Data -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Form Tambah Data Penduduk</h2>
            <form action="{{ route('formadd.store') }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-2 gap-6">
                @csrf

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- NIK -->
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- No KK -->
                <div>
                    <label for="no_kk" class="block text-sm font-medium text-gray-700">No KK</label>
                    <input type="text" id="no_kk" name="no_kk" value="{{ old('no_kk') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- Nama Kepala Keluarga -->
                <div>
                    <label for="kepala_keluarga" class="block text-sm font-medium text-gray-700">Nama Kepala
                        Keluarga</label>
                    <input type="text" id="kepala_keluarga" name="kepala_keluarga" value="{{ old('kepala_keluarga') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- Jumlah Anggota Keluarga -->
                <div>
                    <label for="jumlah_keluarga" class="block text-sm font-medium text-gray-700">Jumlah Anggota
                        Keluarga</label>
                    <input type="number" id="jumlah_keluarga" name="jumlah_keluarga" value="{{ old('jumlah_keluarga') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- Pekerjaan -->
                <div>
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                    <select id="pekerjaan" name="pekerjaan"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                        <option value="">Pilih Pekerjaan</option>
                        <option value="Petani" {{ old('pekerjaan') == 'Petani' ? 'selected' : '' }}>Petani</option>
                        <option value="Pedagang" {{ old('pekerjaan') == 'Pedagang' ? 'selected' : '' }}>Pedagang</option>
                        <option value="Guru" {{ old('pekerjaan') == 'Guru' ? 'selected' : '' }}>Guru</option>
                        <option value="Pegawai Negeri" {{ old('pekerjaan') == 'Pegawai Negeri' ? 'selected' : '' }}>Pegawai
                            Negeri</option>
                        <option value="Lainnya" {{ old('pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- Geolocation -->
                <div>
                    <label for="geolocation" class="block text-sm font-medium text-gray-700">Koordinat Geolocation</label>
                    <input type="text" id="geolocation" name="geolocation"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- Gaji -->
                <div>
                    <label for="gaji" class="block text-sm font-medium text-gray-700">Gaji</label>
                    <input type="number" id="gaji" name="gaji" value="{{ old('gaji') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- No Rumah -->
                <div>
                    <label for="no_rumah" class="block text-sm font-medium text-gray-700">No Rumah</label>
                    <input type="text" id="no_rumah" name="no_rumah" value="{{ old('no_rumah') }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- Desa -->
                <div>
                    <label for="desa" class="block text-sm font-medium text-gray-700">Desa</label>
                    <select id="desa" name="desa" class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                        <option value="" disabled selected>Pilih Desa</option>
                        <option value="Desa Bungkulan">Desa Bungkulan</option>
                        <option value="Desa Temukus">Desa Temukus</option>
                    </select>
                </div>

                <!-- Banjar -->
                <div>
                    <label for="banjar" class="block text-sm font-medium text-gray-700">Banjar</label>
                    <select id="banjar" name="banjar" class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                        <option value="" disabled selected>Pilih Banjar</option>
                    </select>
                </div>

                <!-- Jenis Bantuan -->
                <div>
                    <label for="jenis_bantuan" class="block text-sm font-medium text-gray-700">Jenis Bantuan</label>
                    <select id="jenis_bantuan" name="jenis_bantuan"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                        <option value="">Pilih Jenis Bantuan</option>
                        <option value="PKH">PKH</option>
                        <option value="KIS">KIS</option>
                        <option value="KIP">KIP</option>
                        <option value="PBI">PBI</option>
                    </select>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="kategori" name="kategori"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                        <option value="">Pilih Kategori</option>
                        <option value="Krama Desa Adat">Krama Desa Adat</option>
                        <option value="Krama Tamiu">Krama Tamiu</option>
                        <option value="Tamiu">Tamiu</option>
                    </select>
                </div>

                <!-- Foto Rumah -->
                <div>
                    <label for="rumah" class="block text-sm font-medium text-gray-700">Foto Rumah</label>
                    <input type="file" id="rumah" name="rumah" accept="image/*"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- Foto KK -->
                <div>
                    <label for="kk" class="block text-sm font-medium text-gray-700">Foto KK</label>
                    <input type="file" id="kk" name="kk" accept="image/*"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                </div>

                <!-- Tombol -->
                <div class="col-span-2 flex justify-end space-x-4">
                    <a href="{{ route('datapenduduk') }}"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan
                        Data</button>
                </div>
            </form>
        </div>

    <script src="{{asset('assets/js/admin.js')}}"></script>

</x-sidebar-layout>