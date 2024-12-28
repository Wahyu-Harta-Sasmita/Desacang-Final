<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Operator Desa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-700 h-screen overflow-hidden">
    <!-- Page Wrapper -->
    <div class="flex w-full h-full relative">

        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 bg-gray-800 text-white flex flex-col h-full fixed top-0 left-0 transform -translate-x-full transition-transform duration-300 ease-in-out z-40">
            <div class="p-6 flex items-center justify-between bg-gray-800">
                <!-- Logo dan Teks -->
                <div class="flex items-center">
                    <img src="{{ asset('assets/images/DESACANG.png') }}" alt="Logo" class="w-12 h-12 mr-3">
                    <a href="{{ route('admin') }}" class="text-2xl font-bold text-white tracking-wide">DESACANG</a>
                </div>
            </div>


            <nav class="flex-1 overflow-y-auto">
                <ul class="space-y-2 p-4">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex gap-3 p-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                            <span class="text-lg font-bold">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('datapenduduk') }}"
                            class="flex gap-3 p-2 rounded hover:bg-gray-700 {{ request()->routeIs('datapenduduk') ? 'bg-gray-700' : '' }}">
                            <span class="text-lg font-bold">Data Penduduk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('validasidata') }}"
                            class="flex gap-3 p-2 rounded hover:bg-gray-700 {{ request()->routeIs('validasidata') ? 'bg-gray-700' : '' }}">
                            <span class="text-lg font-bold">Validasi Data Penduduk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('artikel') }}"
                            class="flex gap-3 p-2 rounded hover:bg-gray-700 {{ request()->routeIs('artikel') ? 'bg-gray-700' : '' }}">
                            <span class="text-lg font-bold">Artikel</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="p-4 border-t border-gray-700 text-sm">
                <p class="text-center">Selamat Datang di Dashboard Operator Desa</p>
            </div>
        </aside>

        <div id="mainContent" class="flex-1 flex flex-col transition-all duration-300 ease-in-out overflow-y-auto ml-0">
            <!-- Header -->
            <header
                class="p-6 bg-gray-800 border-b border-gray-300 flex items-center justify-between sticky top-0 z-30">
                <!-- Hamburger Button -->
                <button id="toggleSidebar" class="p-2 bg-gray-800 text-white rounded hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-wide">Operator Desa</h2>
                <!-- Profile Section -->
                <div class="relative">
                    <button id="profileMenuButton"
                        class="p-2 bg-gray-800 text-white rounded-full hover:bg-gray-700 focus:outline-none">
                        <img src="{{ asset('assets/images/profile.png') }}" alt="Profile" class="w-8 h-8 rounded-full">
                    </button>
                    <!-- Profile Dropdown -->
                    <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded shadow-lg">
                        <a href="{{route('profile')}}"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
                        <a href="{{route('pengaturan')}}"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pengaturan</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Keluar</a>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-6 bg-gray-200 shadow-lg">
                {{$slot}}
            </main>

        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{asset('assets/js/admin.js')}}"></script>
</body>

</html>