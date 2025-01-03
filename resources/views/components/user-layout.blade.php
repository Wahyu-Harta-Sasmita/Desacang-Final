<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desacang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav className="bg-gray-800 shadow-md py-4 text-white">
            <div className="container mx-auto flex items-center justify-between">
                <div className="flex items-center gap-3">
                    <Link href="/home">
                        <img
                            src="/assets/images/DESACANG.png"
                            alt="logo"
                            className="h-8 w-8 object-contain"
                        />
                    </Link>
                    <h1 className="text-xl font-bold">DESACANG</h1>
                </div>

                <div className="flex items-center gap-6">
                    <Link
                        href="/article"
                        className=" hover:bg-gray-400 hover:text-black rounded-md py-2 px-4 transition duration-200 font-medium"
                    >
                        Article
                    </Link>

                    <Link
                        href="/addForm"
                        className=" hover:bg-gray-400 hover:text-black rounded-md py-2 px-4 transition duration-200 font-medium"
                    >
                        Tambah Data
                    </Link>

                    <Link href="/notifikasi" className="relative">
                        <img
                            src="/assets/icon/notification.png"
                            alt="notification"
                            className="h-6 w-6"
                        />
                        <span className="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                            3
                        </span>
                    </Link>

                    <Link href="/profiles">
                        <img
                            src="/assets/icon/profile.png"
                            alt="profile"
                            className="h-8 w-8 rounded-full border border-gray-300 object-cover"
                        />
                    </Link>
                </div>
            </div>
        </nav>


        <main>
          {{$slot}}
        </main>

        <footer className="bg-gray-800 text-white py-6">
      <div className="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
        <div className="text-lg font-bold mb-4 md:mb-0">
          DESACANG
        </div>

        <nav className="flex space-x-6 mb-4 md:mb-0">
          <Link href="/home" className="hover:underline">
            Home
          </Link>
          <Link href="/article" className="hover:underline">
            Article
          </Link>
        </nav>

        <div className="flex space-x-4 text-xl">
          <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" className="hover:text-gray-300">
            <FaFacebookF />
          </a>
          <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" className="hover:text-gray-300">
            <FaTwitter />
          </a>
          <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" className="hover:text-gray-300">
            <FaInstagram />
          </a>
          <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" className="hover:text-gray-300">
            <FaLinkedinIn />
          </a>
        </div>
      </div>

      <div className="mt-6 text-center text-sm text-gray-200">
        &copy; {new Date().getFullYear()} DESACANG. All rights reserved.
      </div>
    </footer>
</body>
</html>