<x-sidebar-layout>
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Total Penduduk</h2>
            <p class="text-3xl font-bold text-gray-800">{{ number_format($totalPenduduk) }}</p>
            <p class="text-sm text-gray-500">Data terkini</p>
        </div>

        <!-- Card: Data Belum Validasi -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Data Belum Validasi</h2>
            <p class="text-3xl font-bold text-gray-800">{{ $totalbelumValidasi }}</p>
            <p class="text-sm text-gray-500">Menunggu validasi</p>
        </div>
    </div>

    <!-- Diagram Kategori Penduduk -->
    <div class="bg-white p-6 rounded shadow-lg w-full mb-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700 text-center">Diagram Kategori Penduduk</h2>
        <canvas id="kategoriPendudukChart" class="w-full mt-4" style="height: 300px;"></canvas>
    </div>

    <!-- Data Penduduk Tervalidasi -->
    <!-- Data Penduduk Tervalidasi -->
<div class="bg-white p-6 rounded shadow mb-6">
    <h2 class="text-lg font-semibold mb-4 text-gray-700">Riwayat Data Penduduk Tervalidasi</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-fixed border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700 w-1/3">Nama</th>
                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700 w-1/3">Kategori</th>
                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700 w-1/3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tervalidasi as $item)
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $item->nama }}</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $item->kategori }}</td>
                        <td class="border border-gray-300 p-3 text-sm text-green-600">Tervalidasi</td>
                    </tr>
                @endforeach
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
        <table class="w-full table-fixed border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700 w-1/3">Nama</th>
                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700 w-1/3">Kategori</th>
                    <th class="border border-gray-300 p-3 text-sm font-medium text-gray-700 w-1/3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($belumValidasi as $item)
                    <tr>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $item->nama }}</td>
                        <td class="border border-gray-300 p-3 text-sm text-gray-800">{{ $item->kategori }}</td>
                        <td class="border border-gray-300 p-3 text-sm text-yellow-600">Belum Tervalidasi</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-right mt-2">
        <p class="text-blue-500 hover:underline cursor-pointer">Selengkapnya</p>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const kategoriPendudukData = @json($kategoriPenduduk);

        const labels = Object.keys(kategoriPendudukData);
        const data = Object.values(kategoriPendudukData);

        const ctx = document.getElementById('kategoriPendudukChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Kategori Penduduk',
                    data: data,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-sidebar-layout>