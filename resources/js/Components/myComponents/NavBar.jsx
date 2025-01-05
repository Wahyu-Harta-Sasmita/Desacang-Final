import React from "react";
import { Link } from "@inertiajs/react";

const NavBar = () => {
    return (
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

                    <a
                        href="/user/formadd"
                        className=" hover:bg-gray-400 hover:text-black rounded-md py-2 px-4 transition duration-200 font-medium"
                    >
                        Tambah Data
                    </a>

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
    );
};

export default NavBar;
