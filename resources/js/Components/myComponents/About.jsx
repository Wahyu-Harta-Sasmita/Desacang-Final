import React from "react";
import { Link, usePage } from "@inertiajs/react";

const About = () => {
    const { articles } = usePage().props;

    return (
        <>
            <div>
                <h2 className="font-bold text-2xl text-center py-10">
                    Tentang DESACANG
                </h2>
                <div className="flex flex-wrap justify-around items-center pb-10">
                    <div className="w-[90%] md:w-[30%] h-auto">
                        <img
                            src="/assets/images/Bali2.jpg"
                            alt="cover"
                            className="rounded-lg shadow-md"
                        />
                    </div>
                    <div className="w-[90%] md:w-[40%]">
                        <p className="text-justify leading-relaxed">
                            Desacang adalah sebuah web yang berisi informasi
                            tentang penduduk di Desa Temukus & Bungkulan. Selain
                            untuk melihat informasi penduduk, web ini juga dapat
                            digunakan untuk memberi artikel tentang Desa Temukus
                            & Bungkulan. Tujuan dari pembuatan web ini adalah
                            untuk mempermudah penduduk Desa Temukus & Bungkulan
                            untuk memantau informasi penduduk dan juga untuk
                            melihat informasi terbaru dari Desa Temukus &
                            Bungkulan.
                        </p>
                    </div>
                </div>
            </div>

            {/* Section Artikel */}
            <div>
                <h2 className="font-bold text-2xl text-center pt-10 pb-5">
                    Artikel Terbaru
                </h2>

                <div className="flex flex-wrap justify-center gap-5">
                    {articles.length === 0 ? (
                        <div>No articles available.</div>
                    ) : (
                        articles.map((article) => (
                            <div key={article.id_article} className="p-4 w-80">
                                <div className="bg-gray-200 rounded-lg shadow-md overflow-hidden h-[420px] flex flex-col">
                                    <img
                                        src={`/assets/uploads/article_cover/${article.cover_article}`}
                                        alt={article.judul}
                                        className="w-full h-[192px] object-cover"
                                    />
                                    <div className="p-4 flex-1">
                                        <h3 className="text-lg font-bold text-gray-800">
                                            {article.judul}
                                        </h3>
                                        <span className="text-sm text-gray-500">
                                            {new Date(
                                                article.created_at
                                            ).toLocaleDateString()}
                                        </span>
                                        <p className="text-gray-600 mt-2 line-clamp-3">
                                            {article.deskripsi}
                                        </p>
                                    </div>
                                    <div className="p-4 border-t border-gray-200">
                                        <Link
                                            href={`/article/${article.id_article}`}
                                            className="text-blue-500 hover:text-blue-600 font-semibold"
                                        >
                                            Selengkapnya
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        ))
                    )}
                </div>

                <div className="flex justify-center py-10">
                    <Link
                        href="/article"
                        className="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"
                    >
                        Lebih Banyak
                    </Link>
                </div>
            </div>
        </>
    );
};

export default About;
