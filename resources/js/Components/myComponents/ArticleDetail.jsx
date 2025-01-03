import BerandaLayout from "@/Layouts/BerandaLayout";
import { Link, usePage } from "@inertiajs/react";
import React from "react";

const ArticleDetail = () => {
    const { article } = usePage().props;

    return (
        <div className="container mx-auto p-4">
            <div className="flex items-center gap-4 mb-6">
                <Link href="/article">
                    <img
                        src="/assets/icon/back.png"
                        alt="back"
                        className="w-8 h-8 object-contain"
                    />
                </Link>
                <h1 className="text-3xl font-semibold">{article.judul}</h1>
            </div>
            <div className="mb-6">
                <h3 className="text-xl font-medium text-gray-700">Deskripsi</h3>
                <hr className="my-2" />
                <p className="text-gray-600 text-justify">{article.deskripsi}</p> 
            </div>
            <div className="mb-6">
                {article.article && (
                    <embed
                        src={`/assets/uploads/article/${article.article}`}
                        type="application/pdf"
                        className="w-full h-96 border border-gray-300 rounded"
                    />
                )}
            </div>
            <div className="flex items-center gap-2">
                <input
                    type="text"
                    placeholder="Kirim Komentar"
                    className="border border-gray-300 p-2 rounded w-full"
                />
                <img
                    src="/assets/icon/send.png"
                    alt="send"
                    className="w-8 h-8 cursor-pointer"
                />
            </div>
        </div>
    );
};

ArticleDetail.layout = (page) => <BerandaLayout>{page}</BerandaLayout>;

export default ArticleDetail;
