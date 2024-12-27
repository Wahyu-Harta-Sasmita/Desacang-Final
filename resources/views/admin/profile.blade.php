<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Operator Desa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen overflow-hidden">
    <!-- Page Wrapper -->
    <div class="flex flex-col h-full">

        <!-- Header -->
        <header class="bg-gray-800 text-white p-6">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-semibold">Profil Pengguna</h1>
                <a href="{{ route('admin.dashboard') }}"
                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">Kembali</a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-6">
                <!-- Profile Section -->
                <div class="flex items-center mb-6">
                    <!-- Profile Picture -->
                    <div class="relative">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture"
                            class="w-32 h-32 rounded-full border-4 border-gray-300">
                        <label for="profilePic"
                            class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-4.036a2.5 2.5 0 11-3.536 3.536L9 14l-1 4 4-1 7.036-7.036a2.5 2.5 0 10-3.536-3.536z" />
                            </svg>
                        </label>
                        <input type="file" id="profilePic" class="hidden">
                    </div>
                    <div class="ml-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Nama Pengguna</h2>
                        <p class="text-gray-600">Operator Desa</p>
                    </div>
                </div>

                <!-- Form Section -->
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

                    <!-- Alamat -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="address" name="address" rows="4"
                            class="mt-1 block w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300"
                            placeholder="Masukkan alamat lengkap Anda">Jl. Desa Melati No. 10</textarea>
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
