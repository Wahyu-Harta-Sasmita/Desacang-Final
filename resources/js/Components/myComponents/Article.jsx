import React from "react";

const Article = () => {
    return (
        <>
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
                            <span className="text-sm text-gray-500">Date</span>
                            <p className="text-gray-600 mt-2">
                                Ini adalah deskripsi artikel yang menjelaskan
                                konten secara singkat dan menarik.
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
        </>
    );
};

export default Article;
