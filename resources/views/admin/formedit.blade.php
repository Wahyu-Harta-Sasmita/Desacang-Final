<x-sidebar-layout>
    <!-- Form Edit Data -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Form Edit Data Penduduk</h2>
        <form action="#" method="POST" class="grid grid-cols-2 gap-6">
            <div>
                <label for="nama_kepala_keluarga" class="block text-sm font-medium text-gray-700">Nama Kepala
                    Keluarga</label>
                <input type="text" id="nama_kepala_keluarga" name="nama_kepala_keluarga"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>
            <div>
                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                <input type="text" id="nik" name="nik"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>
            <div>
                <label for="no_kk" class="block text-sm font-medium text-gray-700">No KK</label>
                <input type="text" id="no_kk" name="no_kk"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>
            <div>
                <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                <select id="pekerjaan" name="pekerjaan"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                    <option value="">Pilih Pekerjaan</option>
                    <option value="Petani">Petani</option>
                    <option value="Pedagang">Pedagang</option>
                    <option value="Guru">Guru</option>
                    <option value="Pegawai Negeri">Pegawai Negeri</option>
                </select>
            </div>
            <div>
                <label for="jumlah_anggota_keluarga" class="block text-sm font-medium text-gray-700">Jumlah Anggota
                    Keluarga</label>
                <input type="number" id="jumlah_anggota_keluarga" name="jumlah_anggota_keluarga"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" id="alamat" name="alamat"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>
            <div>
                <label for="koordinat" class="block text-sm font-medium text-gray-700">Koordinat Geolocation</label>
                <input type="text" id="koordinat" name="koordinat"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal"
                    class="mt-1 block w-full border border-gray-300 rounded p-2 text-gray-700">
            </div>
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
            <div>
                <label for="desa" class="block text-sm font-medium text-gray-700">Desa</label>
                <select id="desa" name="desa" class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                    <option value="">Pilih Desa</option>
                    <option value="Desa Melati">Desa Melati</option>
                    <option value="Desa Mawar">Desa Mawar</option>
                    <option value="Desa Anggrek">Desa Anggrek</option>
                </select>
            </div>
            <div>
                <label for="banjar" class="block text-sm font-medium text-gray-700">Banjar</label>
                <select id="banjar" name="banjar" class="w-full p-2 border border-gray-300 rounded focus:outline-none">
                    <option value="">Pilih Banjar</option>
                    <option value="Banjar Melati">Banjar Melati</option>
                    <option value="Banjar Mawar">Banjar Mawar</option>
                    <option value="Banjar Anggrek">Banjar Anggrek</option>
                </select>
            </div>
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
            <div>
                <label for="dokumen" class="block text-sm font-medium text-gray-700">Foto Rumah</label>
                <input type="file" id="dokumen" name="dokumen"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>
            <div>
                <label for="dokumen" class="block text-sm font-medium text-gray-700">Foto KK</label>
                <input type="file" id="dokumen" name="dokumen"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none">
            </div>
            <div class="col-span-2 flex-1 justify-end">
                <button type="button" onclick="window.history.back()"
                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Kembali</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan
                    Data</button>
            </div>
        </form>
    </div>
</x-sidebar-layout>