<x-user-layout>
    <!-- Form Edit Data -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Form Edit Data Penduduk</h2>
        <form id="submit" action="{{ route('user.update', $penduduk->id_penduduk) }}" method="POST"
            enctype="multipart/form-data" class="grid grid-cols-2 gap-6">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $penduduk->nama) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- NIK -->
            <div>
                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                <input type="text" id="nik" name="nik" value="{{ old('nik', $penduduk->nik) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- No KK -->
            <div>
                <label for="no_kk" class="block text-sm font-medium text-gray-700">No KK</label>
                <input type="text" id="no_kk" name="no_kk" value="{{ old('no_kk', $penduduk->no_kk) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- Nama Kepala Keluarga -->
            <div>
                <label for="kepala_keluarga" class="block text-sm font-medium text-gray-700">Nama Kepala
                    Keluarga</label>
                <input type="text" id="kepala_keluarga" name="kepala_keluarga"
                    value="{{ old('kepala_keluarga', $penduduk->kepala_keluarga) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- Jumlah Anggota Keluarga -->
            <div>
                <label for="jumlah_keluarga" class="block text-sm font-medium text-gray-700">Jumlah Anggota
                    Keluarga</label>
                <input type="number" id="jumlah_keluarga" name="jumlah_keluarga"
                    value="{{ old('jumlah_keluarga', $penduduk->jumlah_keluarga) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- Pekerjaan -->
            <div>
                <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                <select id="pekerjaan" name="pekerjaan"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                    <option value="">Pilih Pekerjaan</option>
                    <option value="Petani" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Petani' ? 'selected' : '' }}>
                        Petani</option>
                    <option value="Pedagang" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Pedagang' ? 'selected' : '' }}>
                        Pedagang</option>
                    <option value="Guru" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Guru' ? 'selected' : '' }}>Guru
                    </option>
                    <option value="Pegawai Negeri" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Pegawai Negeri' ? 'selected' : '' }}>Pegawai Negeri</option>
                    <option value="Lainnya" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Lainnya' ? 'selected' : '' }}>
                        Lainnya</option>
                </select>
            </div>

            <!-- Geolocation -->
            <div class="col-span-2">
                <label for="geolocation" class="block text-sm font-medium text-gray-700 mb-2">Koordinat
                    Geolocation</label>
                <div id="map" class="w-full h-72 rounded mb-2"></div>
                <input type="text" id="geolocation" name="geolocation"
                    value="{{ old('geolocation', $penduduk->geolocation) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- Gaji -->
            <div>
                <label for="gaji" class="block text-sm font-medium text-gray-700">Gaji</label>
                <input type="number" id="gaji" name="gaji" value="{{ old('gaji', $penduduk->gaji) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $penduduk->alamat) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- No Rumah -->
            <div>
                <label for="no_rumah" class="block text-sm font-medium text-gray-700">No Rumah</label>
                <input type="text" id="no_rumah" name="no_rumah" value="{{ old('no_rumah', $penduduk->no_rumah) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- Desa -->
            <div>
                <label for="desa" class="block text-sm font-medium text-gray-700">Desa</label>
                <select id="desa" name="desa" class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                    <option value="Desa Bungkulan" {{ old('desa', $penduduk->desa) == 'Desa Bungkulan' ? 'selected' : '' }}>Desa Bungkulan</option>
                    <option value="Desa Temukus" {{ old('desa', $penduduk->desa) == 'Desa Temukus' ? 'selected' : '' }}>
                        Desa Temukus</option>
                </select>
            </div>

            <!-- Banjar -->
            <div>
                <label for="banjar" class="block text-sm font-medium text-gray-700">Banjar</label>
                <input type="text" id="banjar" name="banjar" value="{{ old('banjar', $penduduk->banjar) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>

            <!-- Jenis Bantuan -->
            <div>
                <label for="jenis_bantuan" class="block text-sm font-medium text-gray-700">Jenis Bantuan</label>
                <select id="jenis_bantuan" name="jenis_bantuan"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                    <option value="PKH" {{ old('jenis_bantuan', $penduduk->bantuan->jenis_bantuan) == 'PKH' ? 'selected' : '' }}>PKH</option>
                    <option value="KIS" {{ old('jenis_bantuan', $penduduk->bantuan->jenis_bantuan) == 'KIS' ? 'selected' : '' }}>KIS</option>
                    <option value="KIP" {{ old('jenis_bantuan', $penduduk->bantuan->jenis_bantuan) == 'KIP' ? 'selected' : '' }}>KIP</option>
                    <option value="PBI" {{ old('jenis_bantuan', $penduduk->bantuan->jenis_bantuan) == 'PBI' ? 'selected' : '' }}>PBI</option>
                </select>
            </div>

            <!-- Foto Rumah -->
            <div>
                <label for="rumah" class="block text-sm font-medium text-gray-700">Foto Rumah</label>
                <input type="file" id="rumah" name="rumah" accept="image/*"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah foto rumah.</small>
            </div>

            <!-- Foto KK -->
            <div>
                <label for="kk" class="block text-sm font-medium text-gray-700">Foto KK</label>
                <input type="file" id="kk" name="kk" accept="image/*"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah foto KK.</small>
            </div>

            <!-- Tombol -->
            <div class="col-span-2 flex justify-end space-x-4">
                <a href="{{ route('profiles') }}"
                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Kembali</a>
                <a id="simpan" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan
                    Perubahan</a>
            </div>
        </form>
    </div>

    @push('scripts')
        <!-- Include Leaflet.js -->
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Koordinat awal dari database atau default
                var initialCoordinates = document.getElementById('geolocation').value;
                var latLng = initialCoordinates
                    ? initialCoordinates.split(',').map(Number)
                    : [-8.65, 115.22]; // Default koordinat

                // Inisialisasi Map
                var map = L.map('map').setView(latLng, 13);

                // Tambahkan Tile Layer ke Map
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Tambahkan Marker yang dapat dipindahkan
                var marker = L.marker(latLng, { draggable: true }).addTo(map);

                // Update Input Geolocation saat marker dipindahkan
                marker.on('dragend', function () {
                    var position = marker.getLatLng();
                    document.getElementById('geolocation').value = `${position.lat}, ${position.lng}`;
                });

                // Update Marker dan Input saat peta diklik
                map.on('click', function (e) {
                    var lat = e.latlng.lat;
                    var lng = e.latlng.lng;
                    marker.setLatLng([lat, lng]); // Pindahkan marker ke lokasi yang diklik
                    document.getElementById('geolocation').value = `${lat}, ${lng}`; // Perbarui input
                });

                // Update Marker dan Map saat input geolocation diubah
                document.getElementById('geolocation').addEventListener('change', function () {
                    var inputValue = this.value;
                    var coordinates = inputValue.split(',').map(Number);

                    // Validasi koordinat
                    if (coordinates.length === 2 && !isNaN(coordinates[0]) && !isNaN(coordinates[1])) {
                        var lat = coordinates[0];
                        var lng = coordinates[1];
                        marker.setLatLng([lat, lng]); // Pindahkan marker ke lokasi baru
                        map.setView([lat, lng], 13); // Perbarui tampilan peta
                    } else {
                        alert("Koordinat tidak valid. Harap masukkan dalam format: latitude, longitude");
                    }
                });
            });

            // SweetAlert untuk konfirmasi simpan
            document.getElementById('simpan').addEventListener('click', function () {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Perubahan data akan disimpan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, simpan!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('submit').submit();
                    }
                });
            });
        </script>
    @endpush

    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')

    <script src="{{asset('assets/js/admin.js')}}"></script>

</x-user-layout>