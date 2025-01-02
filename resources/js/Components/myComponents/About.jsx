import React from "react";
import { Link } from "@inertiajs/react";

const About = () => {
    return (
        <>
            <div>
                <h2 className="font-bold text-2xl text-center py-10">
                    Tentang DESACANG
                </h2>
                <div className="flex justify-around items-center pb-10">
                    <div className="w-[30%] h-[35%]">
                        <img src="/assets/images/Bali2.jpg" alt="cover" />
                    </div>
                    <div className="w-[40%]">
                        <p className="text-justify">
                            Desacang adalah sebuah web yang berisi informasi
                            tentang penduduk di Desa Temukus & Bungkulan. Selain
                            untuk melihat informasi penduduk, web ini juga dapat
                            digunakan untuk memberi artikel tentang Desa Temukus
                            & Bungkulan. Tujuan dari pembuatan web ini adalah
                            untuk mempermudah penduduk Desa Temukus & Bungkulan
                            untuk memantau informasi penduduk dan juga untuk
                            melihat informasi informasi terbaru dari desa
                            Temukus & Bungkulan.
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <h2 className="font-bold text-2xl text-center py-10">
                    Artikel Terbaru
                </h2>

                <div className="flex flex-wrap justify-center gap-5">
                    <div className="p-4 w-80">
                        <div className="bg-white rounded-lg shadow-md overflow-hidden h-100 flex flex-col">
                            <img
                                src="https://via.placeholder.com/150"
                                alt="Artikel"
                                className="w-full h-48 object-cover"
                            />
                            <div className="p-4 flex-1">
                                <h3 className="text-lg font-bold text-gray-800">
                                    Artikel 1
                                </h3>
                                <span className="text-sm text-gray-500">
                                    Date
                                </span>
                                <p className="text-gray-600 mt-2">
                                    Ini adalah deskripsi artikel yang
                                    menjelaskan konten secara singkat dan
                                    menarik.
                                </p>
                            </div>
                            <div className="p-4 border-t border-gray-200">
                                <Link
                                    href="#"
                                    className="text-blue-500 hover:text-blue-600 font-semibold"
                                >
                                    Selengkapnya
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div className="p-4 w-80">
                        <div className="bg-white rounded-lg shadow-md overflow-hidden h-100 flex flex-col">
                            <img
                                src="https://via.placeholder.com/150"
                                alt="Artikel"
                                className="w-full h-48 object-cover"
                            />
                            <div className="p-4 flex-1">
                                <h3 className="text-lg font-bold text-gray-800">
                                    Artikel 1
                                </h3>
                                <span className="text-sm text-gray-500">
                                    Date
                                </span>
                                <p className="text-gray-600 mt-2">
                                    Ini adalah deskripsi artikel yang
                                    menjelaskan konten secara singkat dan
                                    menarik.
                                </p>
                            </div>
                            <div className="p-4 border-t border-gray-200">
                                <Link
                                    href="#"
                                    className="text-blue-500 hover:text-blue-600 font-semibold"
                                >
                                    Selengkapnya
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div className="p-4 w-80">
                        <div className="bg-white rounded-lg shadow-md overflow-hidden h-100 flex flex-col">
                            <img
                                src="https://via.placeholder.com/150"
                                alt="Artikel"
                                className="w-full h-48 object-cover"
                            />
                            <div className="p-4 flex-1">
                                <h3 className="text-lg font-bold text-gray-800">
                                    Artikel 1
                                </h3>
                                <span className="text-sm text-gray-500">
                                    Date
                                </span>
                                <p className="text-gray-600 mt-2">
                                    Ini adalah deskripsi artikel yang
                                    menjelaskan konten secara singkat dan
                                    menarik.
                                </p>
                            </div>
                            <div className="p-4 border-t border-gray-200">
                                <Link
                                    href="#"
                                    className="text-blue-500 hover:text-blue-600 font-semibold"
                                >
                                    Selengkapnya
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div className="p-4 w-80">
                        <div className="bg-white rounded-lg shadow-md overflow-hidden h-100 flex flex-col">
                            <img
                                src="https://via.placeholder.com/150"
                                alt="Artikel"
                                className="w-full h-48 object-cover"
                            />
                            <div className="p-4 flex-1">
                                <h3 className="text-lg font-bold text-gray-800">
                                    Artikel 1
                                </h3>
                                <span className="text-sm text-gray-500">
                                    Date
                                </span>
                                <p className="text-gray-600 mt-2">
                                    Ini adalah deskripsi artikel yang
                                    menjelaskan konten secara singkat dan
                                    menarik.
                                </p>
                            </div>
                            <div className="p-4 border-t border-gray-200">
                                <Link
                                    href="#"
                                    className="text-blue-500 hover:text-blue-600 font-semibold"
                                >
                                    Selengkapnya
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div className="p-4 w-80">
                        <div className="bg-white rounded-lg shadow-md overflow-hidden h-100 flex flex-col">
                            <img
                                src="https://via.placeholder.com/150"
                                alt="Artikel"
                                className="w-full h-48 object-cover"
                            />
                            <div className="p-4 flex-1">
                                <h3 className="text-lg font-bold text-gray-800">
                                    Artikel 1
                                </h3>
                                <span className="text-sm text-gray-500">
                                    Date
                                </span>
                                <p className="text-gray-600 mt-2">
                                    Ini adalah deskripsi artikel yang
                                    menjelaskan konten secara singkat dan
                                    menarik.
                                </p>
                            </div>
                            <div className="p-4 border-t border-gray-200">
                                <Link
                                    href="#"
                                    className="text-blue-500 hover:text-blue-600 font-semibold"
                                >
                                    Selengkapnya
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div className="p-4 w-80">
                        <div className="bg-white rounded-lg shadow-md overflow-hidden h-100 flex flex-col">
                            <img
                                src="https://via.placeholder.com/150"
                                alt="Artikel"
                                className="w-full h-48 object-cover"
                            />
                            <div className="p-4 flex-1">
                                <h3 className="text-lg font-bold text-gray-800">
                                    Artikel 1
                                </h3>
                                <span className="text-sm text-gray-500">
                                    Date
                                </span>
                                <p className="text-gray-600 mt-2">
                                    Ini adalah deskripsi artikel yang
                                    menjelaskan konten secara singkat dan
                                    menarik.
                                </p>
                            </div>
                            <div className="p-4 border-t border-gray-200">
                                <Link
                                    href="#"
                                    className="text-blue-500 hover:text-blue-600 font-semibold"
                                >
                                    Selengkapnya
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="flex justify-center py-10">
                <Link href="/article" className="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Lebih Banyak</Link>
                </div>
            </div>
        </>
    );
};

export default About;
