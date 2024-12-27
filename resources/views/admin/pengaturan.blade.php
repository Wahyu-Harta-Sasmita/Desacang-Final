<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pengaturan - Operator Desa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen overflow-hidden">
    <!-- Page Wrapper -->
    <div class="flex flex-col h-full">

        <!-- Header -->
        <header class="bg-gray-800 text-white p-6">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-semibold">Pengaturan</h1>
                <a href="{{ route('admin.dashboard') }}"
                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">Kembali</a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-6">
                <!-- Pengaturan Header -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Kelola Pengaturan Anda</h2>
                    <p class="text-gray-600">Sesuaikan pengaturan sesuai dengan preferensi Anda.</p>
                </div>

                <!-- Tabs -->
                <div class="mb-6 border-b border-gray-300">
                    <nav class="flex space-x-4">
                        <button
                            class="py-2 px-4 text-sm font-medium text-gray-700 border-b-2 border-blue-600 focus:outline-none">Akun</button>
                        <button
                            class="py-2 px-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">Notifikasi</button>
                        <button
                            class="py-2 px-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">Privasi</button>
                        <button
                            class="py-2 px-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">Tema</button>
                    </nav>
                </div>

                <!-- Pengaturan Form -->
                <form action="#" method="POST" class="space-y-6">
                    <!-- Nama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="Nama Pengguna"
                            class="mt-1 block w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300"
                            placeholder="Masukkan nama lengkap Anda">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="user@desa.com"
                            class="mt-1 block w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300"
                            placeholder="Masukkan email Anda">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300"
                            placeholder="Masukkan password baru">
                    </div>

                    <!-- Notifikasi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Notifikasi</label>
                        <div class="flex items-center space-x-4 mt-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="email_notifications" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Email</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="sms_notifications"
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">SMS</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="push_notifications"
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Push Notification</span>
                            </label>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </main>

        <!-- Footer
        <footer class="bg-gray-800 text-gray-400 text-center p-4">
            <p>&copy; 2024 Operator Desa. Semua hak dilindungi.</p>
        </footer> -->
    </div>
</body>

</html>
