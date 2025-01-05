<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desacang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="bg-gray-800 shadow-md py-4 text-white">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="/home">
                <img
                    src="/assets/images/DESACANG.png"
                    alt="logo"
                    class="h-8 w-8 object-contain"
                />
            </a>
            <h1 class="text-xl font-bold">DESACANG</h1>
        </div>

        <div class="flex items-center gap-6">
            <a
                href="/article"
                class="hover:bg-gray-400 hover:text-black rounded-md py-2 px-4 transition duration-200 font-medium"
            >
                Article
            </a>

            <a
                href="/addForm"
                class="hover:bg-gray-400 hover:text-black rounded-md py-2 px-4 transition duration-200 font-medium"
            >
                Tambah Data
            </a>

            <a href="/notifikasi" class="relative">
                <img
                    src="/assets/icon/notification.png"
                    alt="notification"
                    class="h-6 w-6"
                />
                <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                    3
                </span>
            </a>

            <a href="/profiles">
                <img
                    src="/assets/icon/profile.png"
                    alt="profile"
                    class="h-8 w-8 rounded-full border border-gray-300 object-cover"
                />
            </a>
        </div>
    </div>
</nav>

<main>
  {{$slot}}
</main>

<footer class="bg-gray-800 text-white py-6">
  <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
    <div class="text-lg font-bold mb-4 md:mb-0">
      DESACANG
    </div>

    <nav class="flex space-x-6 mb-4 md:mb-0">
      <a href="/home" class="hover:underline">
        Home
      </a>
      <a href="/article" class="hover:underline">
        Article
      </a>
    </nav>

    <div class="flex space-x-4 text-xl">
      <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="hover:text-gray-300">
        <!-- Facebook icon -->
      </a>
      <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="hover:text-gray-300">
        <!-- Twitter icon -->
      </a>
      <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="hover:text-gray-300">
        <!-- Instagram icon -->
      </a>
      <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="hover:text-gray-300">
        <!-- LinkedIn icon -->
      </a>
    </div>
  </div>

  <div class="mt-6 text-center text-sm text-gray-200">
    &copy; 2025 DESACANG. All rights reserved.
  </div>
</footer>
</body>
</html>
